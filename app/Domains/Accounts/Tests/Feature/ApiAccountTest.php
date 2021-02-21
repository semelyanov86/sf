<?php


namespace Domains\Accounts\Tests\Feature;


class ApiAccountTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    protected function create_new_account(string $name): \Illuminate\Testing\TestResponse
    {
        $this->auth();
        return $this->postJson(route('api.accounts.store'), [
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
        ]);
    }
    /** @test */
    public function it_can_see_all_accounts(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.accounts.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_account(): void
    {
        $response = $this->create_new_account('Test see budget');
        $data = $response->json('data');
        $this->auth();
        $response = $this->json('GET', route('api.accounts.show', ['account' => $data['id']]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $data['id']
        ]]);
    }
    /** @test */
    public function it_can_create_new_account(): void
    {
        $response = $this->create_new_account('Test create account');
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test create account',
            'extra' => [
                'data' => []
            ]
        ]]);
    }
    /** @test */
    public function it_can_edit_account(): void
    {
        $response = $this->create_new_account('Account for edit');
        $data = $response->json('data');
        $this->auth();
        $response = $this->putJson(route('api.accounts.update', ['account' => $data['id']]), [
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
        ]);

        $response->assertStatus(202)->assertJson(['data' => [
            "id" => $data['id'],
            "start_balance" => [
                "value" => 2000
            ]
        ]]);
    }
    /** @test */
    public function it_can_see_account_types(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.account-types.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
