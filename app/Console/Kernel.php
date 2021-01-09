<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Game;
use App\Models\GameBid;
use App\Models\GameOption;
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
        $schedule->call(function () {
            Log::info('test '.Carbon::now());
            if (Game::all()->isEmpty()) {
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
                Game::first()->update(['status' => 'playing']);
            } else {
                $currentGame = Game::where('status', 'playing')->first();
                $bids = $currentGame->bids;
                // check winner bid
                if ($bids->isNotEmpty()) {
                    $greenBids = $bids->where('gameOption.color', 'green');
                    $redBids = $bids->where('gameOption.color', 'red');
                    $purpleBids = $bids->where('gameOption.color', 'purple');
                    $colorPoints = collect([
                        [
                            'color' => 'green',
                            'bids' => $greenBids,
                            'point' => $greenBids->sum('point'),
                        ],
                        [
                            'color' => 'red',
                            'bids' => $redBids,
                            'point' => $redBids->sum('point'),
                        ],
                        [
                            'color' => 'purple',
                            'bids' => $purpleBids,
                            'point' => $purpleBids->sum('point'),
                        ],
                    ]);
                    $colorPoints = $colorPoints->sortBy('point');
                    $winnerColor = $colorPoints->first();
                    $numberPoints = GameOption::where('color', $winnerColor['color'])->get();
                    foreach ($numberPoints as $number) {
                        $number['point'] = $winnerColor['bids']->where('gameOption.number', $number->number)->sum('point');
                    }
                    if ($winnerColor == 'purple') {
                        $winnerNumber = $numberPoints->sortBy('point')->first();
                    } else {
                        $winnerNumber = $numberPoints->sortByDesc('point')->first();
                    }
                }
                // reward all winner bids
                GameBid::where('game_id', $currentGame->id)
                    ->where('game_option_id', $winnerNumber->id)
                    ->each(function ($item) {
                        $winnerUser = $item->user;
                        $reward = $item->point * $item->gameOption->point_multiplier;
                        $winnerUser->point += $reward;
                        // add user's point history
                        PointHistory::create([
                            'value' => $reward,
                            'description' => "winner of game $currentGame->id",
                            'user_id' => $winnerUser->id
                        ]);
                        $winnerUser->save();
                        $item->update(['status' => 'win']);
                    });
                // loser bids
                GameBid::where('game_id', $currentGame->id)
                    ->where('game_option_id', '!=', $winnerNumber->id)
                    ->each(function ($item) {
                        $item->update(['status' => 'lose']);
                    });
                // update game status
                Game::where('status', 'playing')->update(['status' => 'finished']);
                Game::where('status', 'queued')->first()->update(['status' => 'playing']);
                // create new game
                $lastGame = Game::latest()->first();
                Game::create([
                    'started_at' => $lastGame->ended_at,
                    'ended_at' => $lastGame->ended_at->addMinute(3),
                ]);
            }
            Log::info('Game Count = '. Game::count());
        })->cron('*/3 * * * *');
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
