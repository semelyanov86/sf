<?php


namespace Domains\Categories\Tests\Feature;


class ApiCategoriesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_categories(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.categories.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_category(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.categories.show', ['category' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_category(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.categories.store'), ['name' => 'Test Category', 'type' => 1, 'is_hidden' => 0]);
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test Category'
        ]]);
    }
    /** @test */
    public function it_can_edit_category(): void
    {
        $this->auth();
        $response = $this->putJson(route('api.categories.update', ['category' => 1]), ['name' => 'Changed name', 'type' => 1, 'is_hidden' => 0]);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "name" => "Changed name"
        ]]);
    }
}
