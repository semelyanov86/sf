<?php


namespace Domains\Banks\Tests\Feature;


class ApiBankTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_banks(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.banks.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_bank(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.banks.show', ['bank' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_bank(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.banks.store'), ['name' => 'Test Bank', 'country_id' => 1, 'description' => 'Test Description']);
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test Bank'
        ]]);
    }
    /** @test */
    public function it_can_edit_bank(): void
    {
        $this->auth();
        $response = $this->putJson(route('api.banks.update', ['bank' => 1]), ['name' => 'Visa Bank']);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "name" => "Visa Bank"
        ]]);
    }
}
