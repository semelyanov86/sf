<?php

namespace Domains\Accounts\Factories;

use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountType;
use Domains\Banks\Models\Bank;
use Domains\Currencies\Models\Currency;
use Domains\Teams\Models\Team;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $types = AccountType::all()->pluck('id')->toArray();
        $states = array_keys(Account::STATE_RADIO);
        return [
            'name' => $this->faker->name,
            'state' => $this->faker->randomElement($states),
            'description' => $this->faker->text,
            'start_balance' => $this->faker->randomNumber(7),
            'market_value' => $this->faker->randomNumber(5),
            'extra_prefix' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'account_type_id' => $this->faker->randomElement($types),
            'currency_id' => function () {
                return Currency::factory()->create()->id;
            },
            'bank_id' => function () {
                return Bank::factory()->create()->id;
            },
            'team_id' => 1,
        ];
    }
}