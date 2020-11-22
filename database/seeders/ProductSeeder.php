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
        // Product::factory()
        //         ->has(ProductImage::factory()->count(3), 'productImages')
        //         ->has(ProductDiscount::factory()->count(3), 'discount')
        //         ->create();
        $products = [
            [
                'title' => 'baju merah pria',
                'description' => 'baju merah pria',
                'price' => 40000,
                'point_price' => 40,
                'category_id' => 1,
                'sub_category_id' => 1,
                'is_redeem' => false
            ],
            [
                'title' => 'celana coklat pria',
                'description' => 'celana coklat pria',
                'price' => 75000,
                'point_price' => 75,
                'category_id' => 1,
                'sub_category_id' => 2,
                'is_redeem' => false
            ],
            [
                'title' => 'gaun putih',
                'description' => 'gaun putih',
                'price' => 250000,
                'point_price' => 250,
                'category_id' => 2,
                'sub_category_id' => 3,
                'is_redeem' => false
            ],
            [
                'title' => 'baju pink wanita',
                'description' => 'baju pink wanita',
                'price' => 30000,
                'point_price' => 30,
                'category_id' => 2,
                'sub_category_id' => 4,
                'is_redeem' => false
            ],
            [
                'title' => 'pulsa tri 10000',
                'description' => 'pulsa tri',
                'price' => 13000,
                'point_price' => 13,
                'category_id' => 3,
                'is_redeem' => false
            ],
            [
                'title' => 'voucher amazon 100000',
                'description' => 'voucher amazon 100000',
                'price' => 105000,
                'point_price' => 105,
                'category_id' => 4,
                'sub_category_id' => 5,
                'is_redeem' => false
            ],
            [
                'title' => 'saldo ovo 50000',
                'description' => 'saldo ovo 50000',
                'price' => 50000,
                'point_price' => 50,
                'is_redeem' => true
            ],
        ];
        foreach($products as $product) {
            Product::create($product);
        }
    }
}
