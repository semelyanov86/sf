<?php

namespace Domains\Accounts\Tests\Feature;

use Domains\Accounts\Models\AccountType;
use Parents\Tests\PhpUnit\TestCase;

class AdminAccountTypesPageTest extends TestCase
{
    /** @test */
    public function it_can_see_account_types_table(): void
    {
        $response = $this->signIn()->get(route('admin.account-types.index'));

        $response->assertStatus(200);

        $response->assertSee('Имущество');
    }
    /** @test */
    public function it_can_create_new_account_type(): void
    {
        $type = AccountType::factory()->createOne();
        $response = $this->signIn()->get(route('admin.account-types.show', ['account_type' => $type->id]));
        $response->assertSee($type->name);
    }
    /** @test */
    public function it_can_edit_account_type(): void
    {
        $type = AccountType::factory()->createOne();
        $type->name = 'Changed Account Type name';
        $type->save();
        $response = $this->signIn()->get(route('admin.account-types.edit', ['account_type' => $type->id]));
        $response->assertSee('Changed Account Type name');
    }
    /** @test */
    public function it_can_delete_account_type(): void
    {
        $type = AccountType::whereId(15)->firstOrFail();
        $type->delete();
        $response = $this->signIn()->get(route('admin.account-types.show', ['account_type' => 15]));
        $response->assertNotFound();
    }
}
