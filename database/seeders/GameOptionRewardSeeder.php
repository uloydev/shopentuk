<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameOptionReward;
use App\Models\GameOption;

class GameOptionRewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = GameOption::all();
        $colorOptions = $options->where('type', 'color');
        $numberOptions = $options->where('type', 'number');

        $numbers = [
            'red' => [0,2,4,6,8],
            'green' => [1,3,5,7,9],
            'purple' => [0,5]
        ];

        foreach ( $colorOptions as $option ) {
            switch ($option->color) {
                case 'red': // 0
                    foreach ( $numbers['red'] as $number) {
                        GameOptionReward::create([
                            'value' => $number == 0 ? 1 : 2,
                            'game_option_id' => $option->id,
                            'winner_option_id' => $numberOptions->firstWhere('number', $number)->id
                        ]);
                    }
                    break;
                case 'green': // 5
                    foreach ( $numbers['green'] as $number) {
                        GameOptionReward::create([
                            'value' => $number == 5 ? 1 : 2,
                            'game_option_id' => $option->id,
                            'winner_option_id' => $numberOptions->firstWhere('number', $number)->id
                        ]);
                    }
                    break;
                case 'purple':
                    foreach ( $numbers['purple'] as $number) {
                        GameOptionReward::create([
                            'value' => 4,
                            'game_option_id' => $option->id,
                            'winner_option_id' => $numberOptions->firstWhere('number', $number)->id
                        ]);
                    }
                    break;
            }
        }
        foreach ( $numberOptions as $option ) {
            GameOptionReward::create([
                'value' => 9,
                'game_option_id' => $option->id,
                'winner_option_id' => $option->id
            ]);
        }
    }
}
