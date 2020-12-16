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
        $category = $this->faker->unique()->randomElement([
            [1, 0],
            [1, 1],
            [2, 0],
            [2, 1],
            [4, 0],
            [4, 1]
        ]);
        
        switch ($category[0]) {
            case 2:
                $combinations = [
                    ['baju', 'baju pria'],
                    ['celana', 'celana pria']
                ];
            break;

            case 4:
                $combinations = [
                    ['baju', 'baju wanita'],
                    ['gaun', 'gaun pria']
                ];
            break;
            case 1:
                $combinations = [
                    ['google play', 'voucher google play'],
                    ['amazon', 'voucher amazon']
                ];
            break;
        }
        $data = $combinations[$category[1]];
        return [
            'title' => $data[0],
            'description' => $data[1],
            'category_id' => $category[0],
        ];
    }
}
