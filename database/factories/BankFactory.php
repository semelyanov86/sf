<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BankFactory extends Factory
{
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
