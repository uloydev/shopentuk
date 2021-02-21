<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameOption;

class GameOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['red', 'green', 'purple'];
        foreach ($colors as $color) { 
            GameOption::create([
                'type' => 'color',
                'color' => $color,
            ]);
        }
        for ($i=1; $i <= 10; $i++) { 
            GameOption::create([
                'type' => 'number',
                'number' => $i % 10,
            ]);
        }
    }
}
