<?php

namespace Domains\Operations\Factories;

use Domains\Accounts\Models\Account;
use Domains\Categories\Models\Category;
use Domains\Operations\Enums\TypeSelectEnum;
use Domains\Operations\Models\Operation;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;
use Parents\ValueObjects\MoneyValueObject;

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
            'amount' => MoneyValueObject::fromNative($this->faker->randomNumber(5)),
            'done_at' => Carbon::now(),
            'type' => TypeSelectEnum::getRandomInstance(),
            'description' => $this->faker->text,
            'related_transactions' => $this->faker->sentence(20),
            'cal_repeat' => 200,
            'google_sync' => $this->faker->boolean,
            'remind_operation' => $this->faker->boolean,
            'is_calendar' => $this->faker->boolean,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'source_account_id' => function () {
                /**
                 * @var Account
                 */
                $account = Account::factory()->create();
                return $account->id;
            },
            'to_account_id' => function () {
                /**
                 * @var Account
                 */
                $account = Account::factory()->create();
                return $account->id;
            },
            'category_id' => $this->faker->randomElement($categories),
            'user_id' => $this->faker->randomElement($users),
            'team_id' => 1,
        ];
    }
}
