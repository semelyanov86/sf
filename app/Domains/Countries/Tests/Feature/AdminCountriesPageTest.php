<?php

namespace Domains\Countries\Tests\Feature;

use Domains\Countries\Models\Country;
use Parents\Tests\PhpUnit\TestCase;

class AdminCountriesPageTest extends TestCase
{
    /** @test */
    public function it_see_countries_list(): void
    {
        $response = $this->signIn()->get(route('admin.countries.index'));

        $response->assertStatus(200);

        $response->assertSee('United States');
    }
    /** @test */
    public function it_create_new_country(): void
    {
        $country = Country::factory()->createOne();
        $response = $this->signIn()->get(route('admin.countries.show', ['country'=>$country->id]));
        $response->assertSee($country->name);
    }
    /** @test */
    public function it_delete_existing_country(): void
    {
        Country::whereId(229)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.countries.show', ['country' => 229]));
        $response->assertNotFound();
    }
}
