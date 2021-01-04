<?php

namespace Tests\Feature;

use App\Models\TargetCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTargetCategoriesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_target_categories_list()
    {
        $response = $this->signIn()->get(route('admin.target-categories.index'));

        $response->assertStatus(200);

        $response->assertSee('Накопить');
    }
    /** @test */
    public function it_can_create_new_target_category()
    {
        $category = TargetCategory::factory()->createOne();
        $response = $this->signIn()->get(route('admin.target-categories.show', ['target_category' => $category->id]));
        $response->assertSee($category->target_category_name);
    }
    /** @test */
    public function it_can_edit_target_category()
    {
        $category = TargetCategory::factory()->createOne();
        $category->target_category_name = 'Changed Target Category';
        $category->save();
        $response = $this->signIn()->get(route('admin.target-categories.edit', ['target_category' => $category->id]));
        $response->assertSee('Changed Target Category');
    }
    /** @test */
    public function it_can_delete_target_category()
    {
        $category = TargetCategory::whereId(15)->firstOrFail();
        $category->delete();
        $response = $this->signIn()->get(route('admin.target-categories.show', ['target_category' => 15]));
        $response->assertNotFound();
    }
}
