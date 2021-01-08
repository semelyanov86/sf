<?php

namespace Domains\Budgets\Factories;

use Domains\Budgets\Models\Budget;
use Domains\Categories\Models\Category;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class BudgetFactory extends Factory
{
    protected $model = Budget::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'plan' => $this->faker->randomNumber(5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => function () {
                /**
                 * @var Category
                 */
                $category = Category::factory()->create();
                return $category->id;
            },
            'user_id' => function () {
                return 1;
            },
            'team_id' => function () {
                return 1;
            },
        ];
    }
}
