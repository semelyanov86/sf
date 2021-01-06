<?php

namespace Domains\AutoBrands\Factories;

use Domains\AutoBrands\Models\AutoBrand;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class AutoBrandFactory extends Factory
{
    protected $model = AutoBrand::class;

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
        ];
    }
}
