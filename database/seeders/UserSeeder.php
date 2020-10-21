<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
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
                'role' => 'superadmin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        ]);

        // create user accounts
        User::factory()->times(10)->has(UserAddress::factory()->count(2))->create();
    }
}
