<?php

namespace Domains\Categories\Factories;

use Domains\Categories\Enums\CategoryTypeEnum;
use Domains\Categories\Models\Category;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $categories = Category::whereNull('sys_category')->whereNull('parent')->get()->pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'type' => CategoryTypeEnum::getRandomValue(),
            'is_hidden' => $this->faker->boolean,
            'parent' => null,
            'sys_category' => $this->faker->randomElement($categories),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
