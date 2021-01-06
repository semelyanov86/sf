<?php

namespace Domains\Teams\Seeders;

use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\Seeders\Seeder;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'id'                 => 1,
                'name'               => 'Main',
                'owner_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Secondary',
                'owner_id' => 3
            ]
        ];

        Team::insert($teams);
        $admin = User::whereId(1)->firstOrFail();
        $admin->team_id = 1;
        $admin->save();
        $user = User::whereId(2)->firstOrFail();
        $user->team_id = 1;
        $user->save();
        $user1 = User::whereId(3)->firstOrFail();
        $user1->team_id = 2;
        $user1->save();
    }
}
