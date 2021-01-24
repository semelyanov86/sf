<?php

namespace Tests\Feature;

use Domains\Users\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiUserTest extends TestCase
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
    public function it_can_see_all_users(): void
    {
        $this->actingAs($this->user, 'api');

        $response = $this->json('GET', route('api.users.index'));
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }
    
    /** @test */
    public function it_can_see_user(): void
    {
        $this->actingAs($this->user, 'api');
        $response = $this->json('GET', route('api.users.show', ['user' => 2]));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
