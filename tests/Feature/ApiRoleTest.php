<?php

namespace Tests\Feature;

use Domains\Users\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiRoleTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::firstOrFail();
    }
    /** @test */
    public function it_can_see_all_roles()
    {
        $this->actingAs($this->user, 'api');
        $response = $this->json('GET', route('api.roles.index'));
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }
    /** @test */
    public function it_can_see_role(): void
    {
        $this->actingAs($this->user, 'api');
        $response = $this->json('GET', route('api.roles.show', ['role' => 2]));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
