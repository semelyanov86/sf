<?php


namespace Domains\Targets\Tests\Feature;


class ApiTargetCategoriesTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_target_categories(): void
    {
        $this->auth();
        $response = $this->get(route('api.target-categories.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_target_category(): void
    {
        $this->auth();
        $response = $this->get(route('api.target-categories.show', ['target_category' => 1]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_target_category(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.target-categories.store'),
            ['target_category_name' => 'Test Category', 'target_category_type' => 1], [
                'accept' => 'application/vnd.api+json',
                'content-type' => 'application/vnd.api+json'
            ]);
        $response->assertStatus(201)->assertJson(['data' => [
            'target_category_name' => 'Test Category'
        ]]);
    }
    /** @test */
    public function it_can_edit_target_category(): void
    {
        $this->auth();
        $response = $this->patchJson(route('api.target-categories.update', ['target_category' => 1]),
            ['target_category_name' => 'Changed name', 'target_category_type' => 1], [
                'accept' => 'application/vnd.api+json',
                'content-type' => 'application/vnd.api+json'
            ]);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "target_category_name" => "Changed name"
        ]]);
    }
}
