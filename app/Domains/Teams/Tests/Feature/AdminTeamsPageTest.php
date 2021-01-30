<?php

namespace Domains\Teams\Tests\Feature;

use Domains\Teams\Models\Team;
use Parents\Tests\PhpUnit\TestCase;

class AdminTeamsPageTest extends TestCase
{

    /** @test */
    public function it_opens_teams_list_table(): void
    {
        $response = $this->signIn()->get(route('admin.teams.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_opens_team_detail_view(): void
    {
        $response = $this->signIn()->get(route('admin.teams.show', ['team' => 1]));

        $response->assertSee('Main');
    }

    /** @test */
    public function it_create_new_team(): void
    {
        Team::create([
            'name' => 'SecondaryTeam',
            'owner_id' => 1
        ]);
        $response = $this->signIn()->get(route('admin.teams.index'));

        $response->assertSee('SecondaryTeam');
    }
}
