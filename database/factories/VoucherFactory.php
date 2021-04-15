<?php

namespace Database\Factories;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $expired = now();
        $expired->addDays(7);
        return [
            'name' => 'voucher ' . $this->faker->sentence($nmWords=2),
            'code' => $this->faker->regexify('[A-Za-z0-9]{6}'),
            'discount_value' => $this->faker->numberBetween(1000, 10000),
            'expired_at' => $expired
        ];
    }
}
