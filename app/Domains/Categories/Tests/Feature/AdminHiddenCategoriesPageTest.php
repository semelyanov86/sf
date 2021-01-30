<?php

namespace Domains\Categories\Tests\Feature;

use Parents\Tests\PhpUnit\TestCase;

class AdminHiddenCategoriesPageTest extends TestCase
{
    /** @test */
    public function it_can_see_hidden_categories_list(): void
    {
        $response = $this->signIn()->get(route('admin.hidden-categories.index'));

        $response->assertStatus(200);

    }
}
