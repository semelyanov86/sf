<?php

namespace Domains\Operations\Tests\Feature;

use Domains\Operations\Models\Operation;
use Parents\Tests\PhpUnit\TestCase;

class AdminOperationsPageTest extends TestCase
{
    /** @test */
    public function it_can_see_operations_list(): void
    {
        $response = $this->signIn()->get(route('admin.operations.index'));

        $response->assertStatus(200);

    }
    /** @test */
    public function it_can_create_new_operation(): void
    {
        $operation = Operation::factory()->createOne();
        $response = $this->signIn()->get(route('admin.operations.show', ['operation' => $operation->id]));
        $response->assertSee($operation->description);
    }
    /** @test */
    public function it_can_edit_operation(): void
    {
        $operation = Operation::factory()->createOne();
        $operation->description = 'Changed Operation Description';
        $operation->save();
        $response = $this->signIn()->get(route('admin.operations.edit', ['operation' => $operation->id]));
        $response->assertSee('Changed Operation Description');
    }
    /** @test */
    public function it_can_delete_operation(): void
    {
        $operation = Operation::factory()->createOne();
        $id = $operation->id;
        $operation = Operation::whereId($id)->firstOrFail();
        $operation->delete();
        $response = $this->signIn()->get(route('admin.operations.show', ['operation' => $id]));
        $response->assertNotFound();
    }
}
