<?php

namespace Domains\Targets\Factories;

use Domains\Targets\Enums\TypeSelectEnum;
use Domains\Targets\Models\TargetCategory;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class TargetCategoryFactory extends Factory
{
    protected $model = TargetCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'target_category_name' => $this->faker->name,
            'target_category_type' => TypeSelectEnum::getRandomValue(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
