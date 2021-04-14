<?php

namespace Database\Factories;

use App\Models\Rules;
use Illuminate\Database\Eloquent\Factories\Factory;

class RulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence($nbWords=10),
        ];
    }
}
