<?php

namespace Database\Factories;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords=3, $variableNbWords=true) . " address",
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'street_address' => $this->faker->streetAddress,
            'kelurahan' => 'meruyung',
            'kecamatan' => 'limo',
            'city' => 'depok',
            'province_id' => $this->faker->numberBetween(1, 34),
            'postal_code' => '16515',
            'is_main_address' => 0,
            'user_id' => User::factory()
        ];
    }
}
