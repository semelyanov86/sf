<?php

namespace Domains\Categories\Tests\Feature;

use Domains\Categories\Models\Category;
use Parents\Tests\PhpUnit\TestCase;

class AdminCategoriesPageTest extends TestCase
{
    /** @test */
    public function it_can_see_categories_list(): void
    {
        $response = $this->signIn()->get(route('admin.categories.index'));

        $response->assertStatus(200);

        $categories = $response->viewData('categories');

        $this->assertTrue($categories->contains(function(Category $value): bool {
            return $value->id == 1;
        }));
    }
    /** @test */
    public function it_create_new_category(): void
    {
        $category = Category::factory()->createOne();
        $response = $this->signIn()->get(route('admin.categories.show', ['category'=>$category->id]));
        $response->assertSee($category->name);
    }
    /** @test */
    public function it_delete_existing_category(): void
    {
        Category::whereId(31)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.categories.show', ['category' => 31]));
        $response->assertNotFound();
    }
}
