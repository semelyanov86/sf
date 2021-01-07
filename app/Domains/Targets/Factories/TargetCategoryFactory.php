<?php

namespace Domains\Targets\Factories;

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
        $types = array_keys(TargetCategory::TARGET_CATEGORY_TYPE_SELECT);
        return [
            'target_category_name' => $this->faker->name,
            'target_category_type' => $this->faker->randomElement($types),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
