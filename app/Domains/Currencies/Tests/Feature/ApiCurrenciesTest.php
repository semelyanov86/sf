<?php


namespace Domains\Currencies\Tests\Feature;


class ApiCurrenciesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_currencies(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.currencies.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_currency(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.currencies.show', ['currency' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1,
            "code" => "RUB"
        ]]);
    }
}
