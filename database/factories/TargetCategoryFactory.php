<?php

namespace Database\Factories;

use App\Models\TargetCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TargetCategoryFactory extends Factory
{
    protected $model = TargetCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
