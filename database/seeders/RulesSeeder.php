<?php

namespace Database\Seeders;

use App\Models\Rules;
use Illuminate\Database\Seeder;

class RulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rules::factory()->count(5)->create();
    }
}
