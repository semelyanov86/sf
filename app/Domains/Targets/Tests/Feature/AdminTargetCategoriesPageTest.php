<?php

namespace Domains\Targets\Tests\Feature;

use Domains\Targets\Models\TargetCategory;
use Parents\Tests\PhpUnit\TestCase;

class AdminTargetCategoriesPageTest extends TestCase
{
    /** @test */
    public function it_can_see_target_categories_list(): void
    {
        $response = $this->signIn()->get(route('admin.target-categories.index'));

        $response->assertStatus(200);

        $response->assertSee('Накопить');
    }
    /** @test */
    public function it_can_create_new_target_category(): void
    {
        $category = TargetCategory::factory()->createOne();
        $response = $this->signIn()->get(route('admin.target-categories.show', ['target_category' => $category->id]));
        $response->assertSee($category->target_category_name);
    }
    /** @test */
    public function it_can_edit_target_category(): void
    {
        $category = TargetCategory::factory()->createOne();
        $category->target_category_name = 'Changed Target Category';
        $category->save();
        $response = $this->signIn()->get(route('admin.target-categories.edit', ['target_category' => $category->id]));
        $response->assertSee('Changed Target Category');
    }
    /** @test */
    public function it_can_delete_target_category(): void
    {
        $category = TargetCategory::whereId(15)->firstOrFail();
        $category->delete();
        $response = $this->signIn()->get(route('admin.target-categories.show', ['target_category' => 15]));
        $response->assertNotFound();
    }
}
