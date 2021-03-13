<?php


namespace Domains\Currencies\Tests\Feature;


class ApiCurrenciesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_currencies(): void
    {
        $this->auth();
        $response = $this->get(route('api.currencies.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_currency(): void
    {
        $this->auth();
        $response = $this->get(route('api.currencies.show', ['currency' => 1]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1,
            "code" => "RUB"
        ]]);
    }
}
