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
            SiteSettingSeeder::class,
            ProductSeeder::class,
            ProductCategorySeeder::class,
            // ProductImageSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            FeedbackCustomerSeeder::class,
            // OrderSeeder::class,
            // ProductDiscountSeeder::class,
        ]);
    }
}
