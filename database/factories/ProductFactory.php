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
            'baju merah pria', 'celana coklat pria', 'gaun putih', 'voucher google play 50000', 'baju pink wanita', 'pulsa tri 10000', 'voucher amazon 100000'
        ];
        $weights = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000]; // in grams

        // // product description dummy
        // $descriptions = array_map(function($title) {
        //     return strtolower($title . ' description');
        // }, $titles);

        $titleProduct = strtolower($this->faker->unique()->randomElement($titles));
        switch ($titleProduct) {
            case 'baju merah pria':
                $category = ProductCategory::where('title', 'pria')->first();
                $subCategory = $category->productSubCategory->where('title', 'baju')->first();
                break;
            case 'celana coklat pria':
                $category = ProductCategory::where('title', 'pria')->first();
                $subCategory = $category->productSubCategory->where('title', 'celana')->first();
                break;
            case 'baju pink wanita':
                $category = ProductCategory::where('title', 'wanita')->first();
                $subCategory = $category->productSubCategory->where('title', 'baju')->first();
                break;
            case 'gaun putih':
                $category = ProductCategory::where('title', 'wanita')->first();
                $subCategory = $category->productSubCategory->where('title', 'gaun')->first();
                break;
            case 'voucher google play 50000':
                $category = ProductCategory::where('title', 'voucher')->first();
                $subCategory = $category->productSubCategory->where('title', 'google play')->first();
                break;
            case 'voucher amazon 100000':
                $category = ProductCategory::where('title', 'voucher')->first();
                $subCategory = $category->productSubCategory->where('title', 'amazon')->first();
                break;
            case 'pulsa tri 10000':
                $category = ProductCategory::where('title', 'pulsa')->first();
                break;
            default:
                break;
        }
        return [
            'title' => $titleProduct,
            'description' => $titleProduct . ' description',
            'price' => $this->faker->numberBetween(10000, 1000000),
            'point_price' => $this->faker->numberBetween(10, 150),
            'category_id' => $category->id,
            'sub_category_id' => isset($subCategory) ? $subCategory->id : NULL,
            'is_redeem' => false,
            'weight' => $category->is_digital_product ? 0 : $this->faker->randomElement($weights),
        ];
    }
}
