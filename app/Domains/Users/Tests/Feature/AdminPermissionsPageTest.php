<?php

namespace Domains\Users\Tests\Feature;

use Domains\Users\Models\Permission;
use Domains\Users\ViewModels\PermissionListViewModel;
use Parents\Tests\PhpUnit\TestCase;

class AdminPermissionsPageTest extends TestCase
{
    /** @test */
    public function it_has_operation_access_permission_value(): void
    {
        $response = $this->signIn()->get(route('admin.permissions.index'));

        $response->assertStatus(200);
        /** @var PermissionListViewModel $permissions */
        $permissions = $response->viewData('viewModel');

        $this->assertTrue($permissions->permissions()->toCollection()->contains(function($value) {
            return $value->title == 'operation_access';
        }));
    }
    /** @test */
    public function it_opens_user_management_permission_page(): void
    {
        $response = $this->signIn()->get(route('admin.permissions.show', ['permission' => 1]));
        $response->assertStatus(200);
        $response->assertSee('user_management_access');
    }
    /** @test */
    public function it_creates_new_permission(): void
    {
        $permission = Permission::factory()->createOne();
        $response = $this->signIn()->get(route('admin.permissions.index'));
        $response->assertSee($permission->title);
    }
}
