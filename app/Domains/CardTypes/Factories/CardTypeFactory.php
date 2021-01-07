<?php

namespace Domains\CardTypes\Factories;

use Domains\CardTypes\Models\CardType;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class CardTypeFactory extends Factory
{
    protected $model = CardType::class;

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
