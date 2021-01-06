<?php

namespace Tests\Feature;

use Domains\Categories\Models\HiddenCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminHiddenCategoriesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_hidden_categories_list()
    {
        $response = $this->signIn()->get(route('admin.hidden-categories.index'));

        $response->assertStatus(200);

    }
}
