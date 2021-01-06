<?php

namespace Tests\Feature;

use Domains\Teams\Models\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTeamsPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    /** @test */
    public function it_opens_teams_list_table()
    {
        $response = $this->signIn()->get(route('admin.teams.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_opens_team_detail_view()
    {
        $response = $this->signIn()->get(route('admin.teams.show', ['team' => 1]));

        $response->assertSee('Main');
    }

    /** @test */
    public function it_create_new_team()
    {
        Team::create([
            'name' => 'SecondaryTeam',
            'owner_id' => 1
        ]);
        $response = $this->signIn()->get(route('admin.teams.index'));

        $response->assertSee('SecondaryTeam');
    }
}
