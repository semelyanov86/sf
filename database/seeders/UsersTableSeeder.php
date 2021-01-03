<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verification_token' => '',
                'login'              => 'admin',
                'timezone'           => '',
                'phone'              => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'User',
                'email'              => 'user@user.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verification_token' => '',
                'login'              => 'user',
                'timezone'           => '',
                'phone'              => '',
            ],
            [
                'id'                 => 3,
                'name'               => 'User1',
                'email'              => 'user1@user.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verification_token' => '',
                'login'              => 'user1',
                'timezone'           => '',
                'phone'              => '',
            ],
        ];

        User::insert($users);
    }
}
