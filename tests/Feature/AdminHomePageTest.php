<?php

namespace Tests\Feature;

use Domains\Operations\Models\Operation;
use Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminHomePageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_has_no_access_of_unauth_user()
    {

        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }
    /** @test */
    public function it_admin_user_can_see_dashboard()
    {
        $response = $this->actingAs(User::first())->get(route('admin.home'));
        $response->assertSee('Операции за последние');
    }
}
