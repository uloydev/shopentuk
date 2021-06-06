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
            UserSeeder::class,
            ProvinceSeeder::class,
            GameOptionSeeder::class,
            GameOptionRewardSeeder::class,
        ]);
        if (env('APP_ENV') == 'local') {
            $this->call([
                ProductImageSeeder::class,
                CartSeeder::class,
                FeedbackCustomerSeeder::class,
                VoucherSeeder::class,
                RulesSeeder::class,
                NewsSeeder::class
                ]);
        }
    }
}
