<?php


namespace Domains\Accounts\Tests\Feature;


use Domains\Accounts\Models\Account;
use Domains\Accounts\Tests\Traits\CreateAccountTrait;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ApiAccountTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    use CreateAccountTrait;
    /** @test */
    public function it_can_see_all_accounts(): void
    {
        $this->auth();
        $accounts = Account::factory()->count(2)->create();
        $response = $this->getJson(route('api.accounts.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => (string) $accounts[0]->id,
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
                "id" => (string) $accounts[1]->id,
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
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }
    /** @test */
    public function it_can_see_account(): void
    {
        $response = $this->create_new_account('Test see budget');
        $data = $response->json('data');
        $this->auth();
        $response = $this->getJson(route('api.accounts.show', ['account' => $data['id']]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $data['id'],
            "type" => "Account",
            "attributes" => $data["attributes"]
        ]]);
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
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
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }
    /** @test */
    public function it_can_edit_account(): void
    {
        $response = $this->create_new_account('Account for edit');
        $data = $response->json('data');
        $this->auth();
        $response = $this->patchJson(route('api.accounts.update', ['account' => $data['id']]), [
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

    public function testDeleteAnAccount(): void
    {
        $this->auth();
        $response = $this->create_new_account('Account for edit');
        $data = $response->json('data');
        $this->assertDatabaseHas('accounts', ['id' => $data['id']]);
        $this->delete(route('api.accounts.destroy', ['account' => $data['id']]), [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertStatus(204);
        $this->assertSoftDeleted('accounts', [
            'id' => $data['id']
        ]);
        $this->assertSoftDeleted('accounts_extras', [
            'id' => $data['id']
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
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
    /**
     * @test
     */
    public function it_validates_that_a_name_attribute_is_given(): void
    {
        $this->auth();
        $data = $this->getDataAttribute();
        $data['name'] = '';
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account',
                'attributes' => $data
            ]
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The data.attributes.name must be a string.',
                        'source' => [
                            'pointer' => '/data/attributes/name'
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseMissing('accounts', [
            'description' => $data['description']
        ]);
    }
    /**
     * @test
     */
    public function it_validates_that_state_attribute_is_required(): void
    {
        $this->auth();
        $data = $this->getDataAttribute();
        $data['state'] = '';
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account',
                'attributes' => $data
            ]
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The data.attributes.state field is required.',
                        'source' => [
                            'pointer' => '/data/attributes/state'
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
    public function it_validates_that_state_attribute_is_enum(): void
    {
        $this->auth();
        $data = $this->getDataAttribute();
        $data['state'] = 8;
        $this->postJson('/api/v1/accounts', [
            'data' => [
                'type' => 'Account',
                'attributes' => $data
            ]
        ], [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ])->assertStatus(422)
            ->assertJson([
                'errors' => [
                    [
                        'title' => 'Validation Error',
                        'details' => 'The value you have entered is invalid.',
                        'source' => [
                            'pointer' => '/data/attributes/state'
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseMissing('accounts', [
            'name' => $data['name']
        ]);
    }

    public function testSortingAccountsByNameThroughQueryParam(): void
    {
        $this->auth();
        $accounts = Account::factory()->count(3)->state(new Sequence(
            ['name' => 'Bertram'],
            ['name' => 'Claus'],
            ['name' => 'Anna'],
        ))->create();
        $response = $this->getJson(route('api.accounts.index') . '?sort=name', [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => (string) $accounts[2]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Anna',
                    'description' => $accounts[2]->description,
                    'state' => [
                        'key' => $accounts[2]->state->key,
                        'value' => $accounts[2]->state->value,
                        'description' => $accounts[2]->state->description
                    ],
                    'start_balance' => [
                        'amount' => $accounts[2]->start_balance->toInt(),
                        'value' => $accounts[2]->start_balance->toValue()
                    ],
                    'market_value' => [
                        'amount' => $accounts[2]->market_value->toInt(),
                        'value' => $accounts[2]->market_value->toValue()
                    ],
                    'extra_prefix' => $accounts[2]->extra_prefix,
                    'account_type_id' => $accounts[2]->account_type_id,
                    'user_id' => $accounts[2]->user_id,
                    'team_id' => $accounts[2]->team_id,
                    'currency_id' => $accounts[2]->currency_id,
                    'bank_id' => $accounts[2]->bank_id
                ]
            ],
            [
                "id" => (string) $accounts[0]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Bertram',
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
                "id" => (string) $accounts[1]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Claus',
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
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

    public function testSortingAccountsByNameInDescendingOrder(): void
    {
        $this->auth();
        $accounts = Account::factory()->count(3)->state(new Sequence(
            ['name' => 'Bertram'],
            ['name' => 'Claus'],
            ['name' => 'Anna'],
        ))->create();
        $response = $this->getJson(route('api.accounts.index') . '?sort=-name', [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => (string) $accounts[1]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Claus',
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
            ],
            [
                "id" => (string) $accounts[0]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Bertram',
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
                "id" => (string) $accounts[2]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Anna',
                    'description' => $accounts[2]->description,
                    'state' => [
                        'key' => $accounts[2]->state->key,
                        'value' => $accounts[2]->state->value,
                        'description' => $accounts[2]->state->description
                    ],
                    'start_balance' => [
                        'amount' => $accounts[2]->start_balance->toInt(),
                        'value' => $accounts[2]->start_balance->toValue()
                    ],
                    'market_value' => [
                        'amount' => $accounts[2]->market_value->toInt(),
                        'value' => $accounts[2]->market_value->toValue()
                    ],
                    'extra_prefix' => $accounts[2]->extra_prefix,
                    'account_type_id' => $accounts[2]->account_type_id,
                    'user_id' => $accounts[2]->user_id,
                    'team_id' => $accounts[2]->team_id,
                    'currency_id' => $accounts[2]->currency_id,
                    'bank_id' => $accounts[2]->bank_id
                ]
            ]
        ]]);
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

    public function testSortingAccountsByMultipleAttributes(): void
    {
        $this->auth();
        $accounts = Account::factory()->count(3)->state(new Sequence(
            ['name' => 'Bertram', 'created_at' => now()->addSeconds(3)],
            ['name' => 'Claus'],
            ['name' => 'Anna'],
        ))->create();
        $response = $this->getJson(route('api.accounts.index') . '?sort=-created_at,name', [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => (string) $accounts[0]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Bertram',
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
                "id" => (string) $accounts[2]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Anna',
                    'description' => $accounts[2]->description,
                    'state' => [
                        'key' => $accounts[2]->state->key,
                        'value' => $accounts[2]->state->value,
                        'description' => $accounts[2]->state->description
                    ],
                    'start_balance' => [
                        'amount' => $accounts[2]->start_balance->toInt(),
                        'value' => $accounts[2]->start_balance->toValue()
                    ],
                    'market_value' => [
                        'amount' => $accounts[2]->market_value->toInt(),
                        'value' => $accounts[2]->market_value->toValue()
                    ],
                    'extra_prefix' => $accounts[2]->extra_prefix,
                    'account_type_id' => $accounts[2]->account_type_id,
                    'user_id' => $accounts[2]->user_id,
                    'team_id' => $accounts[2]->team_id,
                    'currency_id' => $accounts[2]->currency_id,
                    'bank_id' => $accounts[2]->bank_id
                ]
            ],
            [
                "id" => (string) $accounts[1]->id,
                "type" => "Account",
                "attributes" => [
                    'name' => 'Claus',
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
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

}
