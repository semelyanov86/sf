<?php


namespace Domains\Budgets\Tests\Feature;


class ApiBudgetsTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    protected function create_new_budget(int $amount): \Illuminate\Testing\TestResponse
    {
        $this->auth();
        return $this->postJson(route('api.budgets.store'), ['category_id' => 1, 'plan' => $amount, 'user_id' => 1, 'team_id' => 1]);
    }
    /** @test */
    public function it_can_see_all_budgets(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.budgets.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_budget(): void
    {
        $response = $this->create_new_budget(150);
        $data = $response->json('data');
        $this->auth();
        $response = $this->json('GET', route('api.budgets.show', ['budget' => $data['id']]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $data['id']
        ]]);
    }
    /** @test */
    public function it_can_create_new_budget(): void
    {
        $response = $this->create_new_budget(111);
        $response->assertStatus(201)->assertJson(['data' => [
            'plan' => [
                'value' => 111
            ]
        ]]);
    }
    /** @test */
    public function it_can_edit_budget(): void
    {
        $response = $this->create_new_budget(100);
        $data = $response->json('data');
        $this->auth();
        $response = $this->putJson(route('api.budgets.update', ['budget' => $data['id']]), ['plan' => 200, 'category_id' => 1, 'user_id' => 1, 'team_id' => 1]);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => $data['id'],
            "plan" => [
                'value' => 200
            ]
        ]]);
    }
}
