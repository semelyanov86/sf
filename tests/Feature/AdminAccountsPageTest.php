<?php

namespace Tests\Feature;

use Domains\Accounts\Models\Account;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccountsPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_accounts_table()
    {
        $response = $this->signIn()->get(route('admin.accounts.index'));

        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_create_new_account()
    {
        $account = Account::factory()->createOne();
        $response = $this->signIn()->get(route('admin.accounts.index'));
        $response->assertSee($account->name);
    }
    /** @test */
    public function it_can_edit_accounts()
    {
        $account = Account::factory()->createOne();
        $account->name = 'Edited Account';
        $account->save();
        $response = $this->signIn()->get(route('admin.accounts.show', ['account' => $account->id]));
        $response->assertSee('Edited Account');
    }
}
