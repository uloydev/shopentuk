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
                'password' => Hash::make('gakadapassword'),
                'created_at' => Carbon::parse(now())->subMonths(8)
            ],
            [
                'name' => 'admin 2',
                'email' => 'admin2@mail.com',
                'phone' => '019283917281',
                'role' => 'admin',
                'password' => Hash::make('gakadapassword'),
                'created_at' => Carbon::parse(now())->subMonths(3)
            ]
        ]);

        // create user accounts
        User::factory()->times(10)->has(UserAddress::factory()->count(2))->create();
    }
}
