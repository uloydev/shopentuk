<?php

namespace Database\Seeders;

use App\Models\FeedbackCustomer;
use Illuminate\Database\Seeder;

class FeedbackCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeedbackCustomer::factory()->times(15)->create();
    }
}
