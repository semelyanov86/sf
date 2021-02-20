<?php

namespace Domains\Accounts\Factories;

use Domains\Accounts\Enums\AccountStateEnum;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountType;
use Domains\Banks\Models\Bank;
use Domains\Currencies\Models\Currency;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;
use Parents\ValueObjects\MoneyValueObject;

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
        return [
            'name' => $this->faker->name,
            'state' => AccountStateEnum::getRandomInstance(),
            'description' => $this->faker->text,
            'start_balance' => MoneyValueObject::fromNative($this->faker->randomNumber(7)),
            'market_value' => MoneyValueObject::fromNative($this->faker->randomNumber(5)),
            'extra_prefix' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'account_type_id' => $this->faker->randomElement($types),
            'currency_id' => function () {
                /**
                 * @var Currency
                 */
                $currency = Currency::factory()->create();
                return $currency->id;
            },
            'bank_id' => function () {
                /**
                 * @var Bank
                 */
                $bank = Bank::factory()->create();
                return $bank->id;
            },
            'team_id' => 1,
        ];
    }
}
