<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::factory()->times(4)->create();

        // $categories = [
        //     [
        //         'title' => 'pria',
        //         'description' => 'pakaian pria',
        //         'image' => 'https://cdn.icon-icons.com/icons2/1647/PNG/512/10134boy_109887.png',
        //         'is_digital_product' => false,
        //     ],
        //     [
        //         'title' => 'wanita',
        //         'description' => 'pakaian wanita',
        //         'image' => 'https://cdn.icon-icons.com/icons2/108/PNG/256/females_female_avatar_woman_people_faces_18395.png',
        //         'is_digital_product' => false,
        //     ],
        //     [
        //         'title' => 'pulsa',
        //         'description' => 'pulsa sim prabayar',
        //         'image' => 'https://cdn.icon-icons.com/icons2/2596/PNG/512/funds_icon_155349.png',
        //         'is_digital_product' => true,
        //     ],
        //     [
        //         'title' => 'voucher',
        //         'description' => 'voucher',
        //         'image' => 'https://cdn.icon-icons.com/icons2/1577/PNG/512/3615751-banknote-cash-cheque-money-order-payment-voucher_107903.png',
        //         'is_digital_product' => true,
        //     ],
        // ];
        
        $subCategories = [
            [
                'title' => 'baju',
                'description' => 'baju pria',
                'category_id' => 1,
            ],
            [
                'title' => 'celana',
                'description' => 'celana pria',
                'category_id' => 1,
            ],
            [
                'title' => 'gaun',
                'description' => 'gaun wanita',
                'category_id' => 2,
            ],
            [
                'title' => 'baju',
                'description' => 'baju wanita',
                'category_id' => 2,
            ],
            [
                'title' => 'google play',
                'description' => 'voucher google play',
                'category_id' => 4,
            ],
            [
                'title' => 'amazon',
                'description' => 'voucher amazon',
                'category_id' => 4,
            ],
        ];
        // foreach($categories as $category) {
        //     productCategory::create($category);
        // }
        foreach($subCategories as $subCategory) {
            ProductSubCategory::create($subCategory);
        }

    }
}
