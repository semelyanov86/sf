<?php

namespace Tests\Feature;

use Domains\Users\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUserPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_opens_users_list()
    {
        $response = $this->signIn()->get(route('admin.users.index'));

        $response->assertStatus(200);

        $users = $response->viewData('users');

        $this->assertTrue($users->contains(function($value) {
            return $value->email == 'user1@user.com';
        }));
    }

    /** @test */
    public function it_opens_admin_profile_page()
    {
        $response = $this->signIn()->get(route('admin.users.show', ['user' => 1]));
        $response->assertSee('admin@admin.com');
    }
    /** @test */
    public function it_edit_existing_user()
    {
        $user = User::whereId(2)->firstOrFail();
        $user->name = 'User_edit';
        $user->save();
        $response = $this->signIn()->get(route('admin.users.show', ['user' => 2]));
        $userNew = $response->viewData('user');
        $this->assertEquals($userNew->name, $user->name);
    }
    /** @test */
    public function it_create_new_user()
    {
        $user = User::factory()->createOne();
        $response = $this->signIn()->get(route('admin.users.index'));
        $response->assertSee($user->id);
    }

}
