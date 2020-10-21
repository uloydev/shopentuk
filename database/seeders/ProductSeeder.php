<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductDiscount;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::factory()->times(5)->has(
            Product::factory()->count(8)->has(
                ProductImage::factory()->count(3)
            )
        )->create();

        $products = Product::inRandomOrder()->limit(10)->get();
        foreach ($products as $product) {
            ProductDiscount::create([
                'discounted_price' => $product->price * 0.8,
                'product_id' => $product->id,
            ]);
        }
    }
}
