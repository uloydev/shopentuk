<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = $this->faker->unique()->randomElement(['pria', 'wanita', 'pulsa', 'voucher']);

        $isDigitalProduct = false;
        switch ($categories) {
            case 'pria':
                break;

            case 'wanita':
                break;

            case 'pulsa':
                $isDigitalProduct = true;
                break;

            case 'voucher':
                $isDigitalProduct = true;
                break;
        }

        return [
            'title' => $categories,
            'is_digital_product' => $isDigitalProduct,
        ];
    }
}
