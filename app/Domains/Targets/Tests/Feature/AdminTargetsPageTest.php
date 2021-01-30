<?php

namespace Domains\Targets\Tests\Feature;

use Domains\Targets\Models\Target;
use Parents\Tests\PhpUnit\TestCase;

class AdminTargetsPageTest extends TestCase
{
    /** @test */
    public function it_can_see_targets_list(): void
    {
        $response = $this->signIn()->get(route('admin.targets.index'));

        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_create_new_target(): void
    {
        $target = Target::factory()->createOne();
        $response = $this->signIn()->get(route('admin.targets.index'));
        $response->assertStatus(200);
        $response = $this->signIn()->get(route('admin.targets.show', ['target' => $target->id]));
        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_edit_targets(): void
    {
        $target = Target::factory()->createOne();
        $target->target_name = 'Edited target';
        $target->save();
        $response = $this->signIn()->get(route('admin.targets.show', ['target' => $target->id]));
        $response->assertStatus(200);
        $response->assertSee('Edited target');
    }

}
