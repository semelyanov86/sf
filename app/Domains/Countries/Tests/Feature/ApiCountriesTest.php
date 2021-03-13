<?php


namespace Domains\Countries\Tests\Feature;


class ApiCountriesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_countries(): void
    {
        $this->auth();
        $response = $this->get(route('api.countries.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_country(): void
    {
        $this->auth();
        $response = $this->get(route('api.countries.show', ['country' => 176]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 176,
            "name" => "Russia"
        ]]);
    }
}
