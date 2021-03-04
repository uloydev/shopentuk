<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Game;
use App\Models\GameBid;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        $game = Game::first()->update(['status' => 'playing']);
        GameBid::factory()->count(50)->create();

    }
}
