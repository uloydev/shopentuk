<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSubCategory;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSubCategory::factory()->times(6)->create();
    }
}
