<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Currency;
use App\Models\Target;
use App\Models\TargetCategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TargetFactory extends Factory
{
    protected $model = Target::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = array_keys(Target::TARGET_TYPE_SELECT);
        $statuses = array_keys(Target::TARGET_STATUS_RADIO);
        $targetCategories = TargetCategory::all()->pluck('id')->toArray();
        return [
            'target_type' => $this->faker->randomElement($types),
            'target_name' => $this->faker->name,
            'target_status' => $this->faker->randomElement($statuses),
            'amount' => $this->faker->randomNumber(4),
            'first_pay_date' => date(config('panel.date_format')),
            'monthly_pay_amount' => $this->faker->randomNumber(2),
            'pay_to_date' => date(config('panel.date_format')),
            'description' => $this->faker->text,
            'target_is_done' => $this->faker->boolean,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'target_category_id' => $this->faker->randomElement($targetCategories),
            'currency_id' => function () {
                return 1;
            },
            'team_id' => function () {
                return 1;
            },
            'account_from_id' => function () {
                return Account::factory()->create()->id;
            },
            'user_id' => function () {
                return 1;
            },
        ];
    }
}