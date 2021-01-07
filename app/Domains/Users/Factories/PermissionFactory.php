<?php

namespace Domains\Users\Factories;

use Domains\Users\Models\Permission;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
