<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserAddress;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create superadmin account
        User::factory()
        ->make([
            'email' => 'superadmin@mail.com',
            'role' => 'superadmin'
        ])
        ->save();

        // create admin account
        User::factory()
        ->make([
            'email' => 'admin@mail.com',
            'role' => 'admin'
        ])
        ->save();

        // create user accounts
        User::factory()
        ->count(10)
        ->has(
            UserAddress::factory()
            ->count(2)
        )
        ->create();
    }
}
