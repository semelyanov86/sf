<?php

namespace Domains\Users\Seeders;

use Domains\Users\Models\Role;
use Parents\Seeders\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'User',
            ],
            [
                'id'    => 3,
                'title' => 'Manager',
            ],
        ];

        Role::insert($roles);
    }
}
