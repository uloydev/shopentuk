<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => "ACEH", 'is_java' => false],
            ['name' => "SUMATERA UTARA", 'is_java' => false],
            ['name' => "SUMATERA BARAT", 'is_java' => false],
            ['name' => "RIAU", 'is_java' => false],
            ['name' => "JAMBI", 'is_java' => false],
            ['name' => "SUMATERA SELATAN", 'is_java' => false],
            ['name' => "BENGKULU", 'is_java' => false],
            ['name' => "LAMPUNG", 'is_java' => false],
            ['name' => "KEPULAUAN BANGKA BELITUNG", 'is_java' => false],
            ['name' => "KEPULAUAN RIAU", 'is_java' => false],
            ['name' => "DKI JAKARTA", 'is_java' => true],
            ['name' => "JAWA BARAT", 'is_java' => true],
            ['name' => "JAWA TENGAH", 'is_java' => true],
            ['name' => "DAERAH ISTIMEWA YOGYAKARTA", 'is_java' => true],
            ['name' => "JAWA TIMUR", 'is_java' => true],
            ['name' => "BANTEN", 'is_java' => true],
            ['name' => "BALI", 'is_java' => false],
            ['name' => "NUSA TENGGARA BARAT", 'is_java' => false],
            ['name' => "NUSA TENGGARA TIMUR", 'is_java' => false],
            ['name' => "KALIMANTAN BARAT", 'is_java' => false],
            ['name' => "KALIMANTAN TENGAH", 'is_java' => false],
            ['name' => "KALIMANTAN SELATAN", 'is_java' => false],
            ['name' => "KALIMANTAN TIMUR", 'is_java' => false],
            ['name' => "KALIMANTAN UTARA", 'is_java' => false],
            ['name' => "SULAWESI UTARA", 'is_java' => false],
            ['name' => "SULAWESI TENGAH", 'is_java' => false],
            ['name' => "SULAWESI SELATAN", 'is_java' => false],
            ['name' => "SULAWESI TENGGARA", 'is_java' => false],
            ['name' => "GORONTALO", 'is_java' => false],
            ['name' => "SULAWESI BARAT", 'is_java' => false],
            ['name' => "MALUKU", 'is_java' => false],
            ['name' => "MALUKU UTARA", 'is_java' => false],
            ['name' => "P A P U A", 'is_java' => false],
            ['name' => "PAPUA BARAT", 'is_java' => false]
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
