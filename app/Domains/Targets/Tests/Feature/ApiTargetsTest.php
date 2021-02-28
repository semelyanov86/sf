<?php


namespace Domains\Targets\Tests\Feature;


use Domains\Targets\Models\Target;
use Illuminate\Support\Carbon;

class ApiTargetsTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    /** @test */
    public function it_can_see_all_targets(): void
    {
        $this->auth();
        $response = $this->json('GET', route('api.targets.index'));
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
    /** @test */
    public function it_can_see_target(): void
    {
        $this->auth();
        $target = Target::factory()->createOne();
        $response = $this->json('GET', route('api.targets.show', ['target' => $target->id]));
        $response->assertStatus(200)->assertJson(['data' => [
            "id" => $target->id
        ]]);
    }
    /** @test */
    public function it_can_create_new_target(): void
    {
        $this->auth();
        $target = Target::factory()->makeOne();
        $target->target_name = 'Test target';
        $data = $this->convertDataToRequest($target->toArray());
        $response = $this->postJson( route('api.targets.store'), $data);
        $response->assertStatus(201)->assertJson(['data' => [
            'target_name' => 'Test target'
        ]]);
    }
    /** @test */
    public function it_can_edit_target(): void
    {
        $this->auth();
        $target = Target::factory()->createOne();
        $data = $this->convertDataToRequest($target->toArray());
        $data['target_name'] = 'Changed name';
        $response = $this->putJson(route('api.targets.update', ['target' => $target->id]), $data);
        $response->assertStatus(202)->assertJson(['data' => [
            "id" => $target->id,
            "target_name" => "Changed name"
        ]]);
    }

    protected function convertDataToRequest(array $data): array
    {
        $data['amount'] = $data['amount']['amount'];
        $data['monthly_pay_amount'] = $data['monthly_pay_amount']['amount'];
        $data['first_pay_date'] = date(config('panel.date_format'), strtotime($data['first_pay_date']));
        $data['pay_to_date'] = date(config('panel.date_format'), strtotime($data['first_pay_date']));
        $data['target_type'] = $data['target_type']['id'];
        return $data;
    }
}
