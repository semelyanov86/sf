<?php

namespace Tests\Feature;

use Domains\Banks\Models\Bank;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminBanksPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_banks_table_list()
    {
        $response = $this->signIn()->get(route('admin.banks.index'));

        $response->assertStatus(200);

        $currencies = $response->viewData('banks');

        $this->assertTrue($currencies->contains(function($value) {
            return $value->id == 1;
        }));
    }

    /** @test */
    public function it_create_new_bank()
    {
        $bank = Bank::factory()->createOne();
        $response = $this->signIn()->get(route('admin.banks.show', ['bank'=>$bank->id]));
        $response->assertSee($bank->name);
    }

    /** @test */
    public function it_delete_existing_bank()
    {
        Bank::whereId(1421)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.banks.show', ['bank' => 1421]));
        $response->assertNotFound();
    }
}
