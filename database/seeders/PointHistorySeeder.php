<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PointHistory;
use App\Models\User;
use Faker\Factory;

class PointHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::where('role', 'customer')->get();
        foreach ($users as $user) {
            for ($i=0; $i < 4; $i++) { 
                do {
                    $point = $faker->randomElement([-20, -10, 10, 20, 50, 100]);
                } while ($user->point + $point < 0);
                PointHistory::create([
                    'value' => $point,
                    'description' => $point < 0 ? 'penggunaan point' : 'hadiah point',
                    'user_id' => $user->id
                ]);
                $user->point += $point;
                $user->save();
            }
        }
    }
}
