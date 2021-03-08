<?php


namespace Domains\Accounts\Tests\Feature;


use Domains\Accounts\Models\Account;

class ApiAccountTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
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
    /** @test */
    public function it_can_see_all_accounts(): void
    {
        $this->auth();
        $accounts = Account::factory()->count(2)->create();
        $response = $this->json('GET', route('api.accounts.index'));
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => $accounts[0]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => $accounts[0]->name,
                    'description' => $accounts[0]->description,
                    'state' => [
                        'key' => $accounts[0]->state->key,
                        'value' => $accounts[0]->state->value,
                        'description' => $accounts[0]->state->description
                    ],
                    'start_balance' => [
                        'amount' => $accounts[0]->start_balance->toInt(),
                        'value' => $accounts[0]->start_balance->toValue()
                    ],
                    'market_value' => [
                        'amount' => $accounts[0]->market_value->toInt(),
                        'value' => $accounts[0]->market_value->toValue()
                    ],
                    'extra_prefix' => $accounts[0]->extra_prefix,
                    'account_type_id' => $accounts[0]->account_type_id,
                    'user_id' => $accounts[0]->user_id,
                    'team_id' => $accounts[0]->team_id,
                    'currency_id' => $accounts[0]->currency_id,
                    'bank_id' => $accounts[0]->bank_id
                ]
            ],
            [
                "id" => $accounts[1]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => $accounts[1]->name,
                    'description' => $accounts[1]->description,
                    'state' => [
                        'key' => $accounts[1]->state->key,
                        'value' => $accounts[1]->state->value,
                        'description' => $accounts[1]->state->description
                    ],
                    'start_balance' => [
                        'amount' => $accounts[1]->start_balance->toInt(),
                        'value' => $accounts[1]->start_balance->toValue()
                    ],
                    'market_value' => [
                        'amount' => $accounts[1]->market_value->toInt(),
                        'value' => $accounts[1]->market_value->toValue()
                    ],
                    'extra_prefix' => $accounts[1]->extra_prefix,
                    'account_type_id' => $accounts[1]->account_type_id,
                    'user_id' => $accounts[1]->user_id,
                    'team_id' => $accounts[1]->team_id,
                    'currency_id' => $accounts[1]->currency_id,
                    'bank_id' => $accounts[1]->bank_id
                ]
            ]
        ]]);
    }
    /** @test */
    public function it_can_see_account(): void
    {
        $response = $this->create_new_account('Test see budget');
        $data = $response->json('data');
        $this->auth();
        $response = $this->json('GET', route('api.accounts.show', ['account' => $data['id']]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $data['id'],
            "type" => "Account",
            "attributes" => $data["attributes"]
        ]]);
    }
    /** @test */
    public function it_can_create_new_account(): void
    {
        $response = $this->create_new_account('Test create account');
        $data = $response->json('data');
        $response->assertStatus(201)->assertJson(['data' => [
            "id" => (string) $data['id'],
            "type" => "Account",
            "attributes" => [
                'name' => 'Test create account',
                'description' => 'Test account description',
                'state' => [
                    'key' => 'DEFAULT',
                    'value' => 0,
                    'description' => 'Default'
                ],
                'start_balance' => [
                    'amount' => 100000,
                    'value' => 1000,
                    "currency" => [
                        "RUB" => [
                            "name" => "Russian Ruble",
                            "code" => 643,
                            "rate" => 1,
                            "precision" => 2,
                            "subunit" => 100,
                            "symbol" => "₽",
                            "symbol_first" => false,
                            "decimal_mark" => ",",
                            "thousands_separator" => ".",
                            "prefix" => "",
                            "suffix" => " ₽"
                        ]
                    ]
                ],
                'market_value' => [
                    'amount' => 100000,
                    'value' => 1000,
                    "currency" => [
                        "RUB" => [
                            "name" => "Russian Ruble",
                            "code" => 643,
                            "rate" => 1,
                            "precision" => 2,
                            "subunit" => 100,
                            "symbol" => "₽",
                            "symbol_first" => false,
                            "decimal_mark" => ",",
                            "thousands_separator" => ".",
                            "prefix" => "",
                            "suffix" => " ₽"
                        ]
                    ]
                ],
                'extra_prefix' => null,
                'account_type_id' => 5,
                'user_id' => 1,
                'team_id' => 1,
                'currency_id' => 1,
                'bank_id' => 1
            ]
        ]])->assertHeader('Location', url('/api/v1/accounts/' . $data['id']));
        $this->assertDatabaseHas('accounts', [
            'id' => $data['id'],
            'name' => $data['attributes']['name']
        ]);
        $this->assertDatabaseHas('accounts_extras', [
            'id' => $data['id']
        ]);
    }
    /** @test */
    public function it_can_edit_account(): void
    {
        $response = $this->create_new_account('Account for edit');
        $data = $response->json('data');
        $this->auth();
        $response = $this->putJson(route('api.accounts.update', ['account' => $data['id']]), [
            'data' => [
                'id' => $data['id'],
                'type' => 'Account',
                'attributes' => [
                    'name' => 'Account for edit',
                    'description' => 'Test account description',
                    'state' => 0,
                    'start_balance' => 2000,
                    'market_value' => 3000,
                    'account_type_id' => 5,
                    'user_id' => 1,
                    'team_id' => 1,
                    'currency_id' => 1,
                    'bank_id' => 1
                ]
            ]
        ]);

        $response->assertStatus(202)->assertJson(['data' => [
            "id" => $data['id'],
            "type" => "Account",
            "attributes" => [
                'name' => 'Account for edit',
                'description' => 'Test account description',
                'state' => [
                    'key' => 'DEFAULT',
                    'value' => 0,
                    'description' => 'Default'
                ],
                'start_balance' => [
                    'amount' => 200000,
                    'value' => 2000,
                    "currency" => [
                        "RUB" => [
                            "name" => "Russian Ruble",
                            "code" => 643,
                            "rate" => 1,
                            "precision" => 2,
                            "subunit" => 100,
                            "symbol" => "₽",
                            "symbol_first" => false,
                            "decimal_mark" => ",",
                            "thousands_separator" => ".",
                            "prefix" => "",
                            "suffix" => " ₽"
                        ]
                    ]
                ],
                'market_value' => [
                    'amount' => 300000,
                    'value' => 3000,
                    "currency" => [
                        "RUB" => [
                            "name" => "Russian Ruble",
                            "code" => 643,
                            "rate" => 1,
                            "precision" => 2,
                            "subunit" => 100,
                            "symbol" => "₽",
                            "symbol_first" => false,
                            "decimal_mark" => ",",
                            "thousands_separator" => ".",
                            "prefix" => "",
                            "suffix" => " ₽"
                        ]
                    ]
                ],
                'extra_prefix' => null,
                'account_type_id' => 5,
                'user_id' => 1,
                'team_id' => 1,
                'currency_id' => 1,
                'bank_id' => 1
            ]
        ]]);
        $this->assertDatabaseHas('accounts', [
            'id' => $data['id'],
            'name' => 'Account for edit'
        ]);
        $this->assertDatabaseHas('accounts_extras', [
            'id' => $data['id']
        ]);
    }

    public function id_can_delete_account(): void
    {
        $account = Account::factory()->createOne();
        $this->auth();
        $this->delete('/api/v1/accounts/' . $account->id, [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertStatus(204);
        $this->assertDatabaseMissing('accounts', [
            'id' => $account->id
        ]);
        $this->assertDatabaseMissing('accounts_extras', [
            'id' => $account->id
        ]);
    }

    /**
     * @test
     */
    public function it_validates_that_the_type_member_is_given_when_creating_account(): void
    {
        $data = $this->getDataAttribute();
        $this->auth();
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => '',
                'attributes' => $data
            ]
        ])->assertStatus(422)
        ->assertJson([
            'errors' => [
                [
                    'title' => 'Validation Error',
                    'details' => 'The data.type field is required.',
                    'source' => [
                        'pointer' => '/data/type'
                    ]
                ]
            ]
        ]);
        $this->assertDatabaseMissing('accounts', [
            'name' => $data['name']
        ]);
    }

    /**
     * @test
     */
    public function it_validates_that_the_type_member_has_the_value_account(): void
    {
        $data = $this->getDataAttribute();
        $this->auth();
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'accounts',
                'attributes' => $data
            ]
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The selected data.type is invalid.',
                        'source' => [
                            'pointer' => '/data/type'
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseMissing('accounts', [
            'name' => $data['name']
        ]);
    }

    /**
     * @test
     */
    public function it_validates_that_the_attributes_member_has_been_given(): void
    {
        $this->auth();
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account'
            ]
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The data.attributes field is required.',
                        'source' => [
                            'pointer' => '/data/attributes'
                        ]
                    ]
                ]
            ]);
    }

    /**
     * @test
     */
    public function it_passes_validation_and_creates_account(): void
    {
        $data = $this->getDataAttribute();
        $this->auth();
        $response = $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account',
                'attributes' => $data
            ]
        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('accounts', [
            'name' => $data['name']
        ]);
    }

    /**
     * @test
     */
    public function it_validates_attributes_member_as_an_object(): void
    {
        $this->auth();
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account',
                'attributes' => 'not an object'
            ]
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The data.attributes must be an array.',
                        'source' => [
                            'pointer' => '/data/attributes'
                        ]
                    ]
                ]
            ]);
    }

    public function it_validates_that_a_name_attribute_is_given(): void
    {
        $this->auth();
        $data = $this->getDataAttribute();
        $data['name'] = '';
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'accounts',
                'attributes' => $data
            ]
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The data.attributes.name field is required.',
                        'source' => [
                            'pointer' => '/data/type'
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseMissing('accounts', [
            'description' => $data['description']
        ]);
    }

    protected function getDataAttribute(): array
    {
        $account = Account::factory()->makeOne();
        $data = $account->toArray();
        $data['start_balance'] = $data['start_balance']->toValue();
        $data['market_value'] = $data['market_value']->toValue();
        return $data;
    }
}
