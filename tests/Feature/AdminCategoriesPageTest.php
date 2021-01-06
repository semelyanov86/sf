<?php

namespace Tests\Feature;

use Domains\Categories\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCategoriesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_categories_list()
    {
        $response = $this->signIn()->get(route('admin.categories.index'));

        $response->assertStatus(200);

        $categories = $response->viewData('categories');

        $this->assertTrue($categories->contains(function($value) {
            return $value->id == 1;
        }));
    }
    /** @test */
    public function it_create_new_category()
    {
        $category = Category::factory()->createOne();
        $response = $this->signIn()->get(route('admin.categories.show', ['category'=>$category->id]));
        $response->assertSee($category->name);
    }
    /** @test */
    public function it_delete_existing_category()
    {
        Category::whereId(31)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.categories.show', ['category' => 31]));
        $response->assertNotFound();
    }
}
