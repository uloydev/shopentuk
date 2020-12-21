<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create game for 1 hour from now
        $now = Carbon::now();
        $now->second = 0;
        for ($i=1; $i <= 20; $i++) { 
            $game = new Game();
            $game->started_at = $now;
            $now = $now->addMinute(3);
            $game->ended_at = $now;
            $game->status = $i == 1 ? 'playing' : 'queued';
            $game->save();
        }
    }
}
