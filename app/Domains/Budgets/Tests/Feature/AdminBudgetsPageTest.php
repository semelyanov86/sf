<?php

namespace Domains\Budgets\Tests\Feature;

use Domains\Budgets\Models\Budget;
use Parents\Tests\PhpUnit\TestCase;

class AdminBudgetsPageTest extends TestCase
{

    /** @test */
    public function it_can_see_budgets_table(): void
    {
        $response = $this->signIn()->get(route('admin.budgets.index'));

        $response->assertStatus(200);
    }
    /** @test */
    public function it_cat_create_new_budget(): void
    {
        $budget = Budget::factory()->createOne();

        $response = $this->signIn()->get(route('admin.budgets.index'));

        $response->assertSee($budget->id);
    }
    /** @test */
    public function it_can_edit_budgets(): void
    {
        $budget = Budget::factory()->createOne();
        $budget->plan = 77.88;
        $budget->save();
        $response = $this->signIn()->get(route('admin.budgets.show', ['budget' => $budget->id]));
        $response->assertSee(money(7788, 'RUB'));
    }
}
