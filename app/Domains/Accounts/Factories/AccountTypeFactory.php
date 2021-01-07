<?php

namespace Domains\Accounts\Factories;

use Domains\Accounts\Models\AccountType;
use Parents\Factories\Factory;
use Illuminate\Support\Carbon;

class AccountTypeFactory extends Factory
{
    protected $model = AccountType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'parent_description' => $this->faker->text,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return AccountTypeFactory
     */
    protected static function newFactory(): AccountTypeFactory
    {
        return AccountTypeFactory::new();
    }
}
