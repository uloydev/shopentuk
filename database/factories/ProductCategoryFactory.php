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
        return [
            'title' => $this->faker->sentence($nbWords=2, $variableNbWords=true),
            'description' => $this->faker->paragraph($nbSentences=3, $variableNbSentences=true),
            'image' => "img/baju.jpg",
            'is_digital_product' => $this->faker->randomElement([1,0]),
        ];
    }
}
