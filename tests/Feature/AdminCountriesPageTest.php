<?php

namespace Tests\Feature;

use App\Models\Country;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCountriesPageTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    /** @test */
    public function it_see_countries_list()
    {
        $response = $this->signIn()->get(route('admin.countries.index'));

        $response->assertStatus(200);

        $response->assertSee('United States');
    }
    /** @test */
    public function it_create_new_country()
    {
        $country = Country::factory()->createOne();
        $response = $this->signIn()->get(route('admin.countries.show', ['country'=>$country->id]));
        $response->assertSee($country->name);
    }
    /** @test */
    public function it_delete_existing_country()
    {
        Country::whereId(229)->firstOrFail()->delete();
        $response = $this->signIn()->get(route('admin.countries.show', ['country' => 229]));
        $response->assertNotFound();
    }
}
