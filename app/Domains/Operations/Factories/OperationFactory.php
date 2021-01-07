<?php

namespace Domains\Operations\Factories;

use App\Models\Account;
use Domains\Categories\Models\Category;
use Domains\Operations\Models\Operation;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class OperationFactory extends Factory
{
    protected $model = Operation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $categories = Category::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();
        return [
            'amount' => $this->faker->randomNumber(5),
            'done_at' => date(config('panel.date_format')),
            'type' => $this->faker->word,
            'description' => $this->faker->text,
            'related_transactions' => $this->faker->word,
            'cal_repeat' => $this->faker->randomNumber(),
            'google_sync' => $this->faker->boolean,
            'remind_operation' => $this->faker->boolean,
            'is_calendar' => $this->faker->boolean,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'source_account_id' => function () {
                return Account::factory()->create()->id;
            },
            'to_account_id' => function () {
                return Account::factory()->create()->id;
            },
            'category_id' => $this->faker->randomElement($categories),
            'user_id' => $this->faker->randomElement($users),
            'team_id' => 1,
        ];
    }
}
