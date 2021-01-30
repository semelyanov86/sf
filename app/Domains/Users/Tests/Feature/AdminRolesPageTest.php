<?php

namespace Domains\Users\Tests\Feature;

use Parents\Tests\PhpUnit\TestCase;

class AdminRolesPageTest extends TestCase
{

    /** @test */
    public function it_opens_roles_list_table(): void
    {
        $response = $this->signIn()->get(route('admin.roles.index'));

        $response->assertSee('Manager');
    }

    /** @test */
    public function it_opens_user_role_page(): void
    {
        $response = $this->signIn()->get(route('admin.roles.show', ['role' => 2]));

        $response->assertSee('User');
    }
}
