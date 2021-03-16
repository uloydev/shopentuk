<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Game;
use App\Models\GameBid;
use App\Models\GameOption;
use App\Models\GameOptionReward;
use App\Models\PointHistory;

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
        $getSmallestPoint = function ($options, $gameId) {
            foreach ($options as $option) {
                $point = GameBid::where('game_id', $gameId)->where('game_option_id', $option->id)->sum('point');
                $option->setGamePoint($point);
            }
            return $options->sortBy('point')->first();
        };

        $schedule->call(function () use ($getSmallestPoint){
            $now = Carbon::now();

            if (Game::count()) {
                if (!Game::whereIn('status', ['playing', 'finished'])->first()) {
                    if ($now->minute % 3 == 0) {
                        Game::first()->update(['status' => 'playing']);
                    }
                } else {
                    if ($now->minute % 3 == 0) {
                        $nextGame = Game::firstWhere('status', 'queued');
                        // start new game
                        $nextGame->update(['status'=> 'playing']);
                        // add new game to database
                        $lastGame = Game::latest()->first();
                        Game::create([
                            'started_at' => $lastGame->ended_at,
                            'ended_at' => $lastGame->ended_at->addMinute(3),
                        ]);
                        // seed bid to next game
                        GameBid::factory()->count(10)->state(['game_id' => $nextGame->id])->create();
                    } else if ($now->minute % 3 == 2) {
                        // creating variables data
                        $currentGame = Game::firstWhere('status', 'playing');
                        $nextGame = Game::firstWhere('status', 'queued');
                        // $numberOptions = GameOption::where('type', 'number')->get();
                        $gameBids = $currentGame->bids;
                        // jika jml bid = 0 maka random winner pick
                        if ($gameBids->count() > 0) {
                            // kelompok option berdasar warna
                            $colorOptions = GameOption::where('type', 'color')->get();
                            // pilih warna dengan poin terkecil
                            $winnerColor = $getSmallestPoint($colorOptions, $currentGame->id);
                            // kelompokan option berdasar angka
                            $numberOptions = GameOption::whereIn(
                                'id',
                                GameOptionReward::where('game_option_id', $winnerColor->id)->pluck('winner_option_id')
                            )->get();
                            // pilih angka dengan poin terkecil sbg pemenang
                            $winnerOption = $getSmallestPoint($numberOptions, $currentGame->id);
                        } else {
                            // random pick
                            $winnerOption = GameOption::inRandomOrder()->firstWhere('type', 'number');
                        }
                        // get winner bids
                        $winnerBids = $gameBids->whereIn(
                            'game_option_id',
                            GameOptionReward::where('winner_option_id', $winnerOption->id)->pluck('game_option_id')
                        );
                        // get loser bids
                        $loserBids = $gameBids->diff($winnerBids);
                        // update loser bids
                        GameBid::whereIn('id' ,$loserBids->pluck('id'))->update([
                            'status' => 'lose'
                        ]);
                        // update winner bids
                        GameBid::whereIn('id' ,$winnerBids->pluck('id'))->update([
                            'status' => 'win'
                        ]);
                        // send reward to winners
                        $pointOut = 0;
                        foreach ($winnerBids as $bid) {
                            $user = $bid->user;
                            $optionReward = GameOptionReward::where('winner_option_id', $winnerOption->id)->where('game_option_id', $bid->game_option_id)->first();
                            $pointReward = $bid->point * $optionReward->value;
                            $user->point += $pointReward;
                            $user->save();
                            $pointOut += $pointReward;
                            PointHistory::create([
                                'value' => $pointReward,
                                'description' => 'game winner reward',
                                'user_id' => $user->id
                            ]);
                            $bid->reward = $pointReward;
                            $bid->save();
                        }
                        // update current game state
                        $currentGame->update([
                            'status' => 'finished',
                            'winner_option_id' => $winnerOption->id,
                            'point_in' => $gameBids->sum('point'),
                            'point_out' => $pointOut
                        ]);
                    }
                }
            } else {
                $now = Carbon::now();
                $now->second = 0;
                while ($now->minute % 3 != 0) {
                    $now->minute++;
                }
                // create new game
                for ($i=0; $i < 5; $i++) { 
                    $game = new Game();
                    $game->started_at = $now;
                    $now->addMinute(3);
                    $game->ended_at = $now;
                    $game->status = 'queued';
                    $game->save();
                }
                if ($now->minute % 3 == 0) {
                    Game::first()->update(['status' => 'playing']);
                }
                // Game::first()->update(['status' => 'playing']);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
