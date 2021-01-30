<?php

namespace Domains\Users\Tests\Feature;

use Parents\Tests\PhpUnit\ApiTestCase;

class ApiRoleTest extends ApiTestCase
{
    /** @test */
    public function it_can_see_all_roles(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.roles.index'));
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }
    /** @test */
    public function it_can_see_role(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.roles.show', ['role' => 2]));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
