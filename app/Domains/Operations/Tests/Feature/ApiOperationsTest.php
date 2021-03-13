<?php


namespace Domains\Operations\Tests\Feature;


use Domains\Operations\Models\Operation;

class ApiOperationsTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_operations(): void
    {
        $this->auth();
        $operation = Operation::factory()->createOne();
        $response = $this->get(route('api.operations.index'), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_operation(): void
    {
        $operation = Operation::factory()->createOne();
        $this->auth();
        $response = $this->get(route('api.operations.show', ['operation' => $operation->id]), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $operation->id
        ]]);
    }
    /** @test */
    public function it_can_create_new_operation(): void
    {
        $operation = Operation::factory()->make();
        $this->auth();
        $response = $this->postJson(route('api.operations.store'), $this->getDataFromModel($operation), [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);
        $response->assertStatus(201)->assertJson(['data' => [
            'description' => $operation->description,
        ]]);
    }
    /** @test */
    public function it_can_edit_operation(): void
    {
        $operation = Operation::factory()->createOne();
        $data = $this->getDataFromModel($operation);
        $data['description'] = 'Changed Description';
        $this->auth();
        $response = $this->patchJson(route('api.operations.update', ['operation' => $data['id']]), $data, [
            'accept' => 'application/vnd.api+json',
            'content-type' => 'application/vnd.api+json'
        ]);

        $response->assertStatus(202)->assertJson(['data' => [
            "id" => $data['id'],
            "description" => 'Changed Description'
        ]]);
    }

    protected function getDataFromModel(Operation $operation): array
    {
        $data = $operation->toArray();
        $data['amount'] = $operation->amount->toInt();
        $data['done_at'] = $operation->done_at->format('Y-m-d');
        return $data;
    }
}
