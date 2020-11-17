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
        return [
            'title' => strtolower($this->faker->sentence($nbWords=5, $variableNbWords=true)),
            'description' => strtolower($this->faker->paragraph($nbSentences=10, $variableNbSentences=true)),
            'price' => $this->faker->numberBetween($min=10000, $max=100000),
            'point_price' => $this->faker->numberBetween($min=10, $max=100),
            'category_id' => rand(1, 10),
            'sub_category_id' => ProductSubCategory::factory(),
            'is_redeem' => $this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
