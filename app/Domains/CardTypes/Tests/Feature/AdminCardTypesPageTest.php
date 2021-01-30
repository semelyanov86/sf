<?php

namespace Domains\CardTypes\Tests\Feature;

use Domains\CardTypes\Models\CardType;
use Parents\Tests\PhpUnit\TestCase;

class AdminCardTypesPageTest extends TestCase
{

    /** @test */
    public function it_can_see_card_types_list(): void
    {
        $response = $this->signIn()->get(route('admin.card-types.index'));

        $response->assertStatus(200);

        $response->assertSee('MasterCard');
    }

    /** @test */
    public function it_can_create_new_card_type(): void
    {
        $type = CardType::factory()->createOne();
        $response = $this->signIn()->get(route('admin.card-types.show', ['card_type' => $type->id]));
        $response->assertSee($type->name);
    }
    /** @test */
    public function it_can_edit_target_category(): void
    {
        $type = CardType::factory()->createOne();
        $type->name = 'Changed Target Category';
        $type->save();
        $response = $this->signIn()->get(route('admin.card-types.edit', ['card_type' => $type->id]));
        $response->assertSee('Changed Target Category');
    }
    /** @test */
    public function it_can_delete_target_category(): void
    {
        $type = CardType::whereId(15)->firstOrFail();
        $type->delete();
        $response = $this->signIn()->get(route('admin.card-types.show', ['card_type' => 15]));
        $response->assertNotFound();
    }
}
