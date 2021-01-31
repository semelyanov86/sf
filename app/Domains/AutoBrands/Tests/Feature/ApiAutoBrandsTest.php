<?php


namespace Domains\AutoBrands\Tests\Feature;


class ApiAutoBrandsTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_auto_brands(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.auto-brands.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_auto_brand(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.auto-brands.show', ['auto_brand' => 1]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => 1
        ]]);
    }
    /** @test */
    public function it_can_create_new_auto_brand(): void
    {
        $this->auth();
        $response = $this->postJson( route('api.auto-brands.store'), ['name' => 'Test Auto Brand']);
        $response->assertStatus(201)->assertJson(['data' => [
            'name' => 'Test Auto Brand'
        ]]);
    }
    /** @test */
    public function it_can_edit_auto_brand(): void
    {
        $this->auth();
        $response = $this->putJson(route('api.auto-brands.update', ['auto_brand' => 1]), ['name' => 'Edited Brand']);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => 1,
            "name" => "Edited Brand"
        ]]);
    }
}
