<?php

namespace Tests\Feature;

use App\Models\Budget;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminBudgetsPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    /** @test */
    public function it_can_see_budgets_table()
    {
        $response = $this->signIn()->get(route('admin.budgets.index'));

        $response->assertStatus(200);
    }
    /** @test */
    public function it_cat_create_new_budget()
    {
        $budget = Budget::factory()->createOne();

        $response = $this->signIn()->get(route('admin.budgets.index'));

        $response->assertSee($budget->id);
    }
    /** @test */
    public function it_can_edit_budgets()
    {
        $budget = Budget::factory()->createOne();
        $budget->plan = 77.88;
        $budget->save();
        $response = $this->signIn()->get(route('admin.budgets.show', ['budget' => $budget->id]));
        $response->assertSee(money(7788, 'RUB'));
    }
}
