<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsExtrasTable extends Migration
{
    public function up()
    {
        Schema::create('accounts_extras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('card_expire_date')->nullable();
            $table->decimal('card_year_cost', 15, 2)->nullable();
            $table->float('card_rate_balance', 7, 2)->nullable();
            $table->float('card_atm_commission', 7, 2)->nullable();
            $table->float('card_other_atm_commission', 7, 2)->nullable();
            $table->decimal('card_credit_limit', 15, 2)->nullable();
            $table->float('card_credit_interest_rate', 7, 2)->nullable();
            $table->integer('card_credit_grace_period')->nullable();
            $table->float('card_credit_min_payment_percent', 7, 2)->nullable();
            $table->integer('card_credit_min_payment_day')->nullable();
            $table->decimal('card_credit_annual_service_cost', 15, 2)->nullable();
            $table->date('account_open_date')->nullable();
            $table->float('account_interest_rate', 7, 2)->nullable();
            $table->date('account_close_date')->nullable();
            $table->boolean('account_is_capitalization')->default(0)->nullable();
            $table->string('account_interest_period')->nullable();
            $table->string('account_deposit_type')->nullable();
            $table->string('account_credit_payment_type')->nullable();
            $table->float('account_credit_one_time_commission', 7, 2)->nullable();
            $table->float('account_credit_monthly_commission', 7, 2)->nullable();
            $table->integer('account_credit_payment_day')->nullable();
            $table->date('loan_give_date')->nullable();
            $table->date('loan_take_date')->nullable();
            $table->string('loan_debitor_email')->nullable();
            $table->string('loan_debitor_phone')->nullable();
            $table->float('loan_interest_rate', 7, 2)->nullable();
            $table->string('immovables_estate_type')->nullable();
            $table->float('immovables_living_space', 7, 2)->nullable();
            $table->float('immovables_usable_space', 7, 2)->nullable();
            $table->float('immovables_landing_plot', 7, 2)->nullable();
            $table->float('immovables_distance_to_city', 7, 2)->nullable();
            $table->integer('immovables_floor')->nullable();
            $table->integer('immovables_count_floor')->nullable();
            $table->string('immovables_city')->nullable();
            $table->string('immovables_district')->nullable();
            $table->date('immovables_purchase_date')->nullable();
            $table->string('auto_transport_type')->nullable();
            $table->string('auto_model')->nullable();
            $table->string('auto_modification')->nullable();
            $table->string('auto_fuel_type')->nullable();
            $table->string('auto_transmission_type')->nullable();
            $table->string('auto_color')->nullable();
            $table->integer('auto_year')->nullable();
            $table->float('auto_engine_size', 7, 2)->nullable();
            $table->string('auto_region')->nullable();
            $table->float('auto_mileage', 7, 2)->nullable();
            $table->date('auto_purchase_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
