<?php

namespace Domains\Accounts\Tests\Traits;

use Domains\Accounts\Models\Account;

trait CreateAccountTrait
{
    protected function getDataAttribute(): array
    {
        $account = Account::factory()->makeOne();
        $data = $account->toArray();
        $data['start_balance'] = $data['start_balance']->toValue();
        $data['market_value'] = $data['market_value']->toValue();
        return $data;
    }

    protected function create_new_account(string $name): \Illuminate\Testing\TestResponse
    {
        $this->auth();
        return $this->postJson(route('api.accounts.store'), [
            'data' => [
                'type' => 'Account',
                'attributes' => [
                    'name' => $name,
                    'description' => 'Test account description',
                    'state' => 0,
                    'start_balance' => 1000,
                    'market_value' => 1000,
                    'account_type_id' => 5,
                    'user_id' => 1,
                    'team_id' => 1,
                    'currency_id' => 1,
                    'bank_id' => 1
                ]
            ],
        ]);
    }
}
