<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductDiscount;
use App\Models\ProductSubCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::factory()->times(6)->has(
            ProductSubCategory::factory()->count(3)->has(
                Product::factory()->count(8)->has(
                    ProductImage::factory()->count(3)
                )->state(function (array $attributes, ProductSubCategory $subCategory) {
                    return ['category_id' => $subCategory->category_id];
                })
            )
        )->create();

        $products = Product::inRandomOrder()->limit(Product::count() / 2)->get();
        foreach ($products as $product) {
            ProductDiscount::create([
                'discounted_price' => $product->price * 0.8,
                'product_id' => $product->id,
            ]);
        }

        Product::factory()->count(4)->state(function () {
            return ['is_redeem' => true];
        })->create();
    }
}
