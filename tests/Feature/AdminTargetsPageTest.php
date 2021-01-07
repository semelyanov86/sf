<?php

namespace Tests\Feature;

use Domains\Targets\Models\Target;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTargetsPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_targets_list()
    {
        $response = $this->signIn()->get(route('admin.targets.index'));

        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_create_new_target()
    {
        $target = Target::factory()->createOne();
        $response = $this->signIn()->get(route('admin.targets.index'));
        $response->assertStatus(200);
        $response = $this->signIn()->get(route('admin.targets.show', ['target' => $target->id]));
        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_edit_targets()
    {
        $target = Target::factory()->createOne();
        $target->target_name = 'Edited target';
        $target->save();
        $response = $this->signIn()->get(route('admin.targets.show', ['target' => $target->id]));
        $response->assertStatus(200);
        $response->assertSee('Edited target');
    }

}
