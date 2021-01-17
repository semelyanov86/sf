<?php

namespace Domains\Users\Seeders;

use Domains\Users\Models\User;
use Parents\Seeders\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
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
                'timezone'           => 'UTC+3',
                'phone'              => '',
                'language'          => 'ru_ru'
            ],
            [
                'id'                 => 2,
                'name'               => 'User',
                'email'              => 'user@user.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verification_token' => '',
                'login'              => 'user',
                'timezone'           => 'UTC+3',
                'phone'              => '',
                'language'          => 'ru_ru'
            ],
            [
                'id'                 => 3,
                'name'               => 'User1',
                'email'              => 'user1@user.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verification_token' => '',
                'login'              => 'user1',
                'timezone'           => 'UTC+3',
                'phone'              => '',
                'language'          => 'ru_ru'
            ],
        ];

        User::insert($users);
    }
}
