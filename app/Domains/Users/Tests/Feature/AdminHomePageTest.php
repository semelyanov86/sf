<?php

namespace Domains\Users\Tests\Feature;

use Domains\Users\Models\User;
use Parents\Tests\PhpUnit\TestCase;

class AdminHomePageTest extends TestCase
{
    /** @test */
    public function it_has_no_access_of_unauth_user(): void
    {

        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }
    /** @test */
    public function it_admin_user_can_see_dashboard(): void
    {
        $response = $this->actingAs(User::first())->get(route('admin.home'));
        $response->assertSee('Операции за последние');
    }
}
