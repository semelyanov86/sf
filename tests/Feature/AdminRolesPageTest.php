<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRolesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    /** @test */
    public function it_opens_roles_list_table()
    {
        $response = $this->signIn()->get(route('admin.roles.index'));

        $response->assertSee('Manager');
    }

    /** @test */
    public function it_opens_user_role_page()
    {
        $response = $this->signIn()->get(route('admin.roles.show', ['role' => 2]));

        $response->assertSee('User');
    }
}
