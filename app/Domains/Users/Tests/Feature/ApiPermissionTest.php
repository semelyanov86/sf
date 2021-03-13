<?php

namespace Domains\Users\Tests\Feature;

use Domains\Users\Models\User;
use Parents\Tests\PhpUnit\TestCase;

class ApiPermissionTest extends TestCase
{
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::firstOrFail();
    }
    /** @test */
    public function it_can_see_all_permissions(): void
    {
        $this->actingAs($this->user, 'api');
        $response = $this->get(route('api.permissions.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data'=>[]]);
    }
    /** @test */
    public function it_can_see_permission(): void
    {
        $this->actingAs($this->user, 'api');
        $response = $this->get(route('api.permissions.show', ['permission' => 2]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
