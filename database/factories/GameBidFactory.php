<?php

namespace Database\Factories;

use App\Models\GameBid;
use App\Models\PointHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameBidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameBid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 'playing',
            'point' => $this->faker->numberBetween(10, 30),
            'game_id' => 1,
            'user_id' => $this->faker->numberBetween(3, 12),
            'game_option_id' => $this->faker->numberBetween(1, 13),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (GameBid $bid) {
            PointHistory::create([
                'value' => -$bid->point,
                'description' => PointHistory::GAME_BID_MESSAGE,
                'user_id' => $bid->user_id,
            ]);
        });
    }
}
