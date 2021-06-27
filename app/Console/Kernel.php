<?php

namespace App\Console;

use App\Models\Game;
use App\Models\GameBid;
use App\Models\GameOption;
use App\Models\GameOptionReward;
use App\Models\PointHistory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $getSmallestPoint = function ($gameBids, $options) {
            foreach ($options as $option) {
                $point = 0;
                $bids = $gameBids->whereIn('game_option_id', $option->rewards->pluck('game_option_id'));
                foreach ($bids as $bid) {
                    $reward = $option->rewards->firstWhere('game_option_id', $bid->game_option_id);
                    if ($reward) {
                        $point += $bid->point * $reward->value;
                    }
                }
                $option->setGamePoint($point);
            }
            var_dump($options->pluck('point'));
            return $options->sortBy('point')->first();
        };

        $schedule->call(function () use ($getSmallestPoint) {
            try {
                $now = Carbon::now();
                $gameCount = Game::count();
                if ($gameCount) {
                    // creating variables data
                    $currentGame = Game::firstWhere('status', 'playing');
                    $nextGame = Game::orderBy('started_at')->where('ended_at', '>', $now)->where('started_at', '<', $now)->firstWhere('status', 'queued');
                    $gameBids = $currentGame->bids;
                    $pointOut = 0;
                    // check if current game is not a custom game
                    if ($currentGame->is_custom) {
                        $winnerOption = $currentGame->winnerOption;
                    } else {
                        // jika jml bid = 0 maka random winner pick
                        if ($gameBids->count() > 0) {
                            // pilih option dengan poin terkecil sbg pemenang
                            $winnerOption = $getSmallestPoint($gameBids, GameOption::with('rewards')->where('type', 'number')->get());

                            // get winner bids
                            $winnerBids = $gameBids->whereIn(
                                'game_option_id',
                                GameOptionReward::where('winner_option_id', $winnerOption->id)->pluck('game_option_id')
                            );
                            // get loser bids
                            $loserBids = $gameBids->diff($winnerBids);
                            // update loser bids
                            GameBid::whereIn('id', $loserBids->pluck('id'))->update([
                                'status' => 'lose',
                            ]);
                            // update winner bids
                            GameBid::whereIn('id', $winnerBids->pluck('id'))->update([
                                'status' => 'win',
                            ]);
                            // send reward to winners
                            foreach ($winnerBids as $bid) {
                                $user = $bid->user;
                                $optionReward = GameOptionReward::where('winner_option_id', $winnerOption->id)->where('game_option_id', $bid->game_option_id)->first();
                                $pointReward = $bid->point * $optionReward->value;
                                $user->point += $pointReward;
                                $user->save();
                                $pointOut += $pointReward;
                                PointHistory::create([
                                    'value' => $pointReward,
                                    'description' => PointHistory::GAME_WINNER_MESSAGE,
                                    'user_id' => $user->id,
                                ]);
                                $bid->reward = $pointReward;
                                $bid->save();
                            }
                        } else {
                            // random pick
                            $winnerOption = GameOption::with('rewards')->inRandomOrder()->firstWhere('type', 'number');
                        }
                    }
                    // update current game state
                    // check if current game is a custom game
                    if ($currentGame->is_custom) {
                        $currentGame->update([
                            'status' => 'finished',
                            'point_in' => $gameBids->sum('point'),
                            'point_out' => $pointOut,
                        ]);
                    } else {
                        $currentGame->update([
                            'status' => 'finished',
                            'winner_option_id' => $winnerOption->id,
                            'point_in' => $gameBids->sum('point'),
                            'point_out' => $pointOut,
                        ]);
                    }
                    // start new game
                    $nextGame->update(['status' => 'playing']);
                    // add new game to database
                    $lastGame = Game::where('is_custom', false)->latest()->first();
                    // create new game if not exist
                    $newStartTime = $lastGame->ended_at;
                    $newEndTime = clone $newStartTime;
                    $newEndTime->addMinutes(2);
                    $newGame = Game::firstOrCreate([
                        'started_at' => $newStartTime,
                        'ended_at' => $newEndTime,
                    ]);
                    while ($newGame->is_custom) {
                        $newStartTime->addMinutes(2);
                        $newEndTime->addMinutes(2);
                        $newGame = Game::firstOrCreate([
                            'started_at' => $newStartTime,
                            'ended_at' => $newEndTime,
                        ]);
                    }
                } else {
                    $now = Carbon::now();
                    $now->second = 0;
                    while ($now->minute % 2 != 0) {
                        $now->minute++;
                    }
                    // create new game
                    for ($i = 0; $i < 5; $i++) {
                        $game = new Game();
                        $game->started_at = $now;
                        $now->addMinute(2);
                        $game->ended_at = $now;
                        $game->status = 'queued';
                        $game->save();
                    }
                    $nextGame = Game::first();
                    $nextGame->update(['status' => 'playing']);
                }
                // delete game if more than 24 hours
                Game::where('ended_at', '<=', $now->subDays(1))->delete();
                // seed bid to next game
                // GameBid::factory()->count(50)->state(['game_id' => $nextGame->id])->create();
            } catch (\Throwable$th) {
                var_dump($th);
            }
        })->everyTwoMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
