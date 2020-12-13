<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'title' => 'shopentuk',
            'description' => 'my online shop',
            'shipping_price' => 10000,
            'non_java_shipping_price' => 20000,
            'point_value' => 1000
        ]);
    }
}
