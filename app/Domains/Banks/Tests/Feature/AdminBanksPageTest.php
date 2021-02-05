<?php

namespace Domains\Banks\Tests\Feature;

use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Models\Bank;
use Parents\Tests\PhpUnit\TestCase;

class AdminBanksPageTest extends TestCase
{
    /** @test */
    public function it_can_see_banks_table_list(): void
    {
        $response = $this->signIn()->get(route('admin.banks.index'));

        $response->assertStatus(200);

        $viewModel = $response->viewData('viewModel');

        $this->assertTrue($viewModel->banks()->toCollection()->contains(function(BankData $value): bool {
            return $value->id == 1;
        }));
    }

    /** @test */
    public function it_create_new_bank(): void
    {
        $bank = Bank::factory()->createOne();
        $response = $this->signIn()->get(route('admin.banks.show', ['bank'=>$bank->id]));
        $response->assertSee($bank->name);
    }

    /** @test */
    public function it_delete_existing_bank(): void
    {
        Bank::whereId(1421)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.banks.show', ['bank' => 1421]));
        $response->assertNotFound();
    }
}
