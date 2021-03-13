<?php


namespace Domains\Categories\Tests\Feature;


class ApiCategoriesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_categories(): void
    {
        $this->auth();
        $response = $this->get(route('api.categories.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_category(): void
    {
        $this->auth();
        $response = $this->get(route('api.categories.show', ['category' => 1]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_category(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.categories.store'),
            ['name' => 'Test Category', 'type' => 1, 'is_hidden' => 0], [
                'accept' => 'application/vnd.api+json',
                'content-type' => 'application/vnd.api+json'
            ]);
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test Category'
        ]]);
    }
    /** @test */
    public function it_can_edit_category(): void
    {
        $this->auth();
        $response = $this->patchJson(route('api.categories.update', ['category' => 1]),
            ['name' => 'Changed name', 'type' => 1, 'is_hidden' => 0], [
                'accept' => 'application/vnd.api+json',
                'content-type' => 'application/vnd.api+json'
            ]);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "name" => "Changed name"
        ]]);
    }
}
