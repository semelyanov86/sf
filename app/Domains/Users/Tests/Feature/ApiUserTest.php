<?php

namespace Domains\Users\Tests\Feature;

use Parents\Tests\PhpUnit\ApiTestCase;

class ApiUserTest extends ApiTestCase
{
    /** @test */
    public function it_can_see_all_users(): void
    {
        $this->auth();

        $response = $this->json('GET', route('api.users.index'));
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }

    /** @test */
    public function it_can_see_user(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.users.show', ['user' => 2]));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
