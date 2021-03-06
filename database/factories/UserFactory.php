<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => '0' . substr($this->faker->e164PhoneNumber, 3),
            'email_verified_at' => now()->translatedFormat('Y-m-d H:i:s'),
            'password' => Hash::make('password'), // password
            'role' => 'customer',
            'point' => 100,
            'remember_token' => Str::random(10),
            'bank' => 'bca',
            'pemilik_rekening' => $this->faker->name,
            'rekening' => 123456789,
        ];
    }
}
