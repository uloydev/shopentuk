<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;

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
        return [
            'title' => $this->faker->sentence($nbWords=5, $variableNbWords=true),
            'description' => $this->faker->paragraph($nbSentences=3, $variableNbSentences=true),
            'price' => $this->faker->numberBetween($min=10000, $max=100000),
            'point_price' => $this->faker->numberBetween($min=10, $max=100),
            'category_id' => ProductCategory::factory(),
        ];
    }
}
