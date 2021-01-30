<?php

namespace Domains\Users\Tests\Feature;

use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Models\User;
use Parents\Tests\PhpUnit\TestCase;

class AdminUserPageTest extends TestCase
{
    /** @test */
    public function it_opens_users_list(): void
    {
        $response = $this->signIn()->get(route('admin.users.index'));

        $response->assertStatus(200);

        $usersViewModel = $response->viewData('viewModel');

        $this->assertTrue($usersViewModel->users()->toCollection()->contains(function(UserData $value): bool
        {
            return $value->email == 'user1@user.com';
        }));
    }

    /** @test */
    public function it_opens_admin_profile_page(): void
    {
        $response = $this->signIn()->get(route('admin.users.show', ['user' => 1]));
        $response->assertSee('admin@admin.com');
    }
    /** @test */
    public function it_edit_existing_user(): void
    {
        $user = User::whereId(2)->firstOrFail();
        $user->name = 'User_edit';
        $user->save();
        $response = $this->signIn()->get(route('admin.users.show', ['user' => 2]));
        $viewModel = $response->viewData('viewModel');
        $this->assertEquals($viewModel->user()->name, $user->name);
    }
    /** @test */
    public function it_create_new_user(): void
    {
        $user = User::factory()->createOne();
        $response = $this->signIn()->get(route('admin.users.index'));
        $response->assertSee($user->id);
    }

}
