<?php


namespace Domains\Accounts\Tests\Feature;


use Domains\Accounts\Models\AccountType;

class ApiAccountTypeTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_account_types(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.account-types.index'));
        $response->assertStatus(200)->assertJson(['data' => [
            [
                "id" => "1",
                "type" => "AccountType",
                "attributes" => [
                    "name" => "Наличные",
                    "parent_description" => "Деньги"
                ]
            ],
            [
                "id" => "2",
                "type" => "AccountType",
                "attributes" => [
                    "name" => "Дебетовая карта",
                    "parent_description" => "Деньги"
                ]
            ]
        ]]);
    }
    /** @test */
    public function it_can_see_account_type(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.account-types.show', ['account_type' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1,
            "type" => "AccountType",
            "attributes" => [
                "name" => "Наличные",
                "parent_description" => "Деньги"
            ]
        ]]);
    }
}
