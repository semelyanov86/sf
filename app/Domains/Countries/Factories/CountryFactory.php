<?php

namespace Domains\Countries\Factories;

use Domains\Countries\Models\Country;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'short_code' => $this->faker->countryCode,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
