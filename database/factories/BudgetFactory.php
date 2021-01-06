<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Category;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BudgetFactory extends Factory
{
    protected $model = Budget::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plan' => $this->faker->randomNumber(5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => function () {
                return Category::factory()->create()->id;
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
