<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDiscount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'discounted_price' => function (array $attributes) {
                return Product::find($attributes['product_id'])->price * 0.5;
            },
            'product_id' => rand(1, 20)
        ];
    }
}
