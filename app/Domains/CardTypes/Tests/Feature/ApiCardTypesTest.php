<?php


namespace Domains\CardTypes\Tests\Feature;


class ApiCardTypesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_card_types(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.card-types.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_card_type(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.card-types.show', ['card_type' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_card_type(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.card-types.store'), ['name' => 'Test Card']);
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test Card'
        ]]);
    }
    /** @test */
    public function it_can_edit_card_type(): void
    {
        $this->auth();
        $response = $this->putJson(route('api.card-types.update', ['card_type' => 1]), ['name' => 'Visa Edited']);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "name" => "Visa Edited"
        ]]);
    }
}
