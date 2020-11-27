<?php

namespace Database\Factories;

use App\Models\FeedbackCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackCustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedbackCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName, 
            'telephone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->safeEmail, 
            'message' => $this->faker->paragraph(5, true)
        ];
    }
}
