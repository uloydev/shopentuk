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
        $options = [
            'green' => [1,3,7,9],
            'red' => [2,4,6,8],
            'purple' => [0,5]
        ];

        foreach ($options as $color => $numbers) {
            foreach ($numbers as $number) {
                GameOption::create([
                    'number' => $number,
                    'color' => $color,
                    'point_multiplier' => 3,
                ]);
            }         
        }
    }
}
