<?php

namespace Domains\Teams\Tests\Feature;

use Parents\Tests\PhpUnit\ApiTestCase;

class ApiTeamTest extends ApiTestCase
{
    /** @test */
    public function it_can_see_all_teams(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.teams.index'));
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }
    /** @test */
    public function it_can_see_teams(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.teams.show', ['team' => 1]));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
