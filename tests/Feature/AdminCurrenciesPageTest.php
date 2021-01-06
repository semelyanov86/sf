<?php

namespace Tests\Feature;

use Domains\Currencies\Models\Currency;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCurrenciesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;
    /** @test */
    public function it_can_see_currencies_table_list()
    {
        $response = $this->signIn()->get(route('admin.currencies.index'));

        $response->assertStatus(200);

        $currencies = $response->viewData('currencies');

        $this->assertTrue($currencies->contains(function($value) {
            return $value->id == 1;
        }));
    }

    /** @test */
    public function it_create_new_currency()
    {
        $currency = Currency::factory()->createOne();
        $response = $this->signIn()->get(route('admin.currencies.show', ['currency'=>$currency->id]));
        $response->assertSee($currency->name);
    }

    /** @test */
    public function it_delete_existing_currency()
    {
        Currency::whereId(150)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.currencies.show', ['currency' => 150]));
        $response->assertNotFound();
    }
}
