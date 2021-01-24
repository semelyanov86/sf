<?php

namespace Tests\Feature;

use Domains\AutoBrands\Models\AutoBrand;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAutoBrandsPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    /** @test */
    public function it_can_see_auto_brands_list(): void
    {
        $response = $this->signIn()->get(route('admin.auto-brands.index'));

        $response->assertStatus(200);

        $response->assertSee('Tesla');
    }

    /** @test */
    public function it_can_create_new_card_type(): void
    {
        $type = AutoBrand::factory()->createOne();
        $response = $this->signIn()->get(route('admin.auto-brands.show', ['auto_brand' => $type->id]));
        $response->assertSee($type->name);
    }
    /** @test */
    public function it_can_edit_target_category(): void
    {
        $type = AutoBrand::factory()->createOne();
        $type->name = 'Changed Auto Brand';
        $type->save();
        $response = $this->signIn()->get(route('admin.auto-brands.edit', ['auto_brand' => $type->id]));
        $response->assertSee('Changed Auto Brand');
    }
    /** @test */
    public function it_can_delete_target_category(): void
    {
        $type = AutoBrand::whereId(1284)->firstOrFail();
        $type->delete();
        $response = $this->signIn()->get(route('admin.auto-brands.show', ['auto_brand' => 1284]));
        $response->assertNotFound();
    }
}
