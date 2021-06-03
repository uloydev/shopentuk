<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'production') {
            User::create([
                'name' => 'superadmin',
                'email' => 'superadmin@mail.com',
                'phone' => '1234567890',
                'role' => 'superadmin',
                'password' => Hash::make('@shopentuk2021@'),
                'created_at' => Carbon::now()
            ]);
        } else {
            // create superadmin and admin account
            User::insert([
                [
                    'name' => 'superadmin',
                    'email' => 'superadmin@mail.com',
                    'phone' => '1234567890',
                    'role' => 'superadmin',
                    'password' => Hash::make('password'),
                    'created_at' => Carbon::parse(now())->subMonths(10)
                ],
                [
                    'name' => 'admin',
                    'email' => 'admin@mail.com',
                    'phone' => '1234567891',
                    'role' => 'admin',
                    'password' => Hash::make('password'),
                    'created_at' => Carbon::parse(now())->subMonths(8)
                ]
            ]);
    
            // create user accounts
            User::factory()->times(10)->has(UserAddress::factory()->count(2))->create();
        }
    }
}
