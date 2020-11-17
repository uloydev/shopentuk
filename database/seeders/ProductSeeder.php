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
        Product::factory()
                ->has(ProductImage::factory()->count(3), 'productImages')
                ->has(ProductDiscount::factory()->count(3), 'discount')
                ->create();
    }
}
