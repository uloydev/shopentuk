<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = [
            'baju merah pria', 'celana coklat pria', 'gaun putih', 'saldo ovo 50000',
            'baju pink wanita', 'pulsa tri 10000', 'voucher amazon 100000'
        ];

        // product description dummy
        $descriptions = array_map(function($title) {
            return strtolower($title . ' description');
        }, $titles);

        $titleProduct = strtolower($this->faker->randomElement($titles));

        return [
            'title' => $titleProduct,
            'description' => $this->faker->randomElement($descriptions),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'point_price' => $this->faker->numberBetween(10, 150),
            'category_id' => $titleProduct != 'saldo ovo 50000' ? rand(1, 4) : null,
            'sub_category_id' => $titleProduct != 'pulsa tri 10000' ? rand(1, 5) : null,
            'is_redeem' => $this->faker->boolean(50)
        ];
    }
}
