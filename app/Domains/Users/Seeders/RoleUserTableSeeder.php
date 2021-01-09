<?php

namespace Domains\Users\Seeders;

use Domains\Users\Models\User;
use Parents\Seeders\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run(): void
    {
        User::findOrFail(1)->roles()->sync([1]);
        User::findOrFail(2)->roles()->sync([3]);
    }
}
