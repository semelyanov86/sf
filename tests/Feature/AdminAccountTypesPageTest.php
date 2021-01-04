<?php

namespace Tests\Feature;

use App\Models\AccountType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccountTypesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_account_types_table()
    {
        $response = $this->signIn()->get(route('admin.account-types.index'));

        $response->assertStatus(200);

        $response->assertSee('Имущество');
    }
    /** @test */
    public function it_can_create_new_account_type()
    {
        $type = AccountType::factory()->createOne();
        $response = $this->signIn()->get(route('admin.account-types.show', ['account_type' => $type->id]));
        $response->assertSee($type->name);
    }
    /** @test */
    public function it_can_edit_account_type()
    {
        $type = AccountType::factory()->createOne();
        $type->name = 'Changed Account Type name';
        $type->save();
        $response = $this->signIn()->get(route('admin.account-types.edit', ['account_type' => $type->id]));
        $response->assertSee('Changed Account Type name');
    }
    /** @test */
    public function it_can_delete_account_type()
    {
        $type = AccountType::whereId(15)->firstOrFail();
        $type->delete();
        $response = $this->signIn()->get(route('admin.account-types.show', ['account_type' => 15]));
        $response->assertNotFound();
    }
}
