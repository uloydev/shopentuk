<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Game;
use App\Models\GameBid;

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
