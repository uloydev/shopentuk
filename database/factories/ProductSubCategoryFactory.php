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
        $temps = [];
        $categories = ProductCategory::all();
        foreach( $categories as $category) {
            switch ($category->title) {
                case 'pria':
                    array_push($temps, [1,0,$category->id], [1,1,$category->id]);
                    break;
                case 'wanita':
                    array_push($temps, [2,0,$category->id], [2,1,$category->id]);
                    break;    
                case 'voucher':
                    array_push($temps, [3,0,$category->id], [3,1,$category->id]);
                    break;
                case 'pulsa':
                    break;
                }
        }
        $temp = $this->faker->unique()->randomElement($temps);
        switch ($temp[0]) {
            case 1:
                $combinations = [
                    ['baju', 'baju pria'],
                    ['celana', 'celana pria']
                ];
            break;

            case 2:
                $combinations = [
                    ['baju', 'baju wanita'],
                    ['gaun', 'gaun wanita']
                ];
            break;
            case 3:
                $combinations = [
                    ['google play', 'voucher google play'],
                    ['amazon', 'voucher amazon']
                ];
            break;
        }
        $data = $combinations[$temp[1]];
        return [
            'title' => $data[0],
            'description' => $data[1],
            'category_id' => $temp[2],
        ];
    }
}
