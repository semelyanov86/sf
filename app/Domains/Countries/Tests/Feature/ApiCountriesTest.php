<?php


namespace Domains\Countries\Tests\Feature;


class ApiCountriesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_countries(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.countries.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_country(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.countries.show', ['country' => 176]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 176,
            "name" => "Russia"
        ]]);
    }
}
