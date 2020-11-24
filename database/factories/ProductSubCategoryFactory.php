<?php

namespace Database\Factories;

use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;

class ProductSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryId = $this->faker->randomElement([1, 2, 4]);
        
        switch ($categoryId) {
            case 1:
                $titleOption = ['baju', 'celana'];
                $descriptions = ['baju pria', 'celana pria'];
            break;

            case 2:
                $titleOption = ['gaun', 'baju'];
                $descriptions = ['gaun wanita', 'baju wanita'];
            break;
            case 4:
                $titleOption = ['google play', 'amazon'];
                $descriptions = ['voucher google play', 'voucher amazon'];
            break;
        }
        
        $titles = $this->faker->randomElement($titleOption);
        
        return [
            'title' => $titles,
            'description' => $this->faker->randomElement($descriptions),
            'category_id' => ProductCategory::factory(),
        ];
    }
}
