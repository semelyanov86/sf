<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\HiddenCategory;
use Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HiddenCategoriesFactory extends Factory
{
    protected $model = HiddenCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
