<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductCategorySeeder::class,
            ProductSubCategorySeeder::class,
            SiteSettingSeeder::class,
            ProductImageSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            FeedbackCustomerSeeder::class,
            VoucherSeeder::class,
            ProvinceSeeder::class,
            PointHistorySeeder::class,
            // GameSeeder::class,
            GameOptionSeeder::class,
            GameOptionRewardSeeder::class,
            // OrderSeeder::class,
            // ProductDiscountSeeder::class,
            RulesSeeder::class
        ]);
    }
}
