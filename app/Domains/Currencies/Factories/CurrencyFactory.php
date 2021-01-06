<?php

namespace Domains\Currencies\Factories;

use Domains\Currencies\Models\Currency;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->word,
            'name' => $this->faker->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
