<?php

namespace Domains\Categories\Factories;

use Domains\Categories\Models\Category;
use Domains\Categories\Models\HiddenCategory;
use Domains\Users\Models\User;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class HiddenCategoriesFactory extends Factory
{
    protected $model = HiddenCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $categories = Category::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => $this->faker->randomElement($categories),
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
