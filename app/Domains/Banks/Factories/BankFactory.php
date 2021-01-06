<?php

namespace Domains\Banks\Factories;

use Domains\Banks\Models\Bank;
use Domains\Countries\Models\Country;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class BankFactory extends Factory
{
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'country_id' => function () {
                return Country::factory()->create()->id;
            },
        ];
    }
}
