<?php


namespace Domains\Accounts\Transformers;


use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\AccountsExtra;

class AccountExtraTransformer extends \Parents\Transformers\Transformer
{
    public function transform(AccountsExtra $accountExtraData): array
    {
        return array(
            'id' => $accountExtraData->id,
            'account_deposit_type' => $accountExtraData->account_deposit_type?->description,
            'immovables_estate_type' => $accountExtraData->immovables_estate_type?->description,
            'account_credit_payment_type' => $accountExtraData->account_credit_payment_type?->description,
            'auto_transmission_type' => $accountExtraData->auto_transmission_type?->description,
            'auto_fuel_type' => $accountExtraData->auto_fuel_type?->description,
            'account_interest_period' => $accountExtraData->account_interest_period?->description,
            'card_type_id' => $accountExtraData->card_type_id,
            'card_expire_date' => $accountExtraData->card_expire_date,
            'card_year_cost' => $accountExtraData->card_year_cost?->toArray(),
            'card_rate_balance' => $accountExtraData->card_rate_balance,
            'card_atm_commission' => $accountExtraData->card_atm_commission,
            'card_other_atm_commission' => $accountExtraData->card_other_atm_commission,
            'card_credit_limit' => $accountExtraData->card_credit_limit?->toArray(),
            'card_credit_interest_rate' => $accountExtraData->card_credit_interest_rate,
            'card_credit_grace_period' => $accountExtraData->card_credit_grace_period,
            'card_credit_min_payment_percent' => $accountExtraData->card_credit_min_payment_percent,
            'card_credit_min_payment_day' => $accountExtraData->card_credit_min_payment_day,
            'card_credit_annual_service_cost' => $accountExtraData->card_credit_annual_service_cost,
            'account_open_date' => $accountExtraData->account_open_date,
            'account_interest_rate' => $accountExtraData->account_interest_rate,
            'account_close_date' => $accountExtraData->account_close_date,
            'account_is_capitalization' => $accountExtraData->account_is_capitalization,
            'account_credit_one_time_commission' => $accountExtraData->account_credit_one_time_commission,
            'account_credit_monthly_commission' => $accountExtraData->account_credit_monthly_commission,
            'account_credit_payment_day' => $accountExtraData->account_credit_payment_day,
            'loan_give_date' => $accountExtraData->loan_give_date,
            'loan_take_date' => $accountExtraData->loan_take_date,
            'loan_debitor_email' => $accountExtraData->loan_debitor_email,
            'loan_debitor_phone' => $accountExtraData->loan_debitor_phone,
            'loan_interest_rate' => $accountExtraData->loan_interest_rate,
            'immovables_living_space' => $accountExtraData->immovables_living_space,
            'immovables_usable_space' => $accountExtraData->immovables_usable_space,
            'immovables_landing_plot' => $accountExtraData->immovables_landing_plot,
            'immovables_distance_to_city' => $accountExtraData->immovables_distance_to_city,
            'immovables_floor' => $accountExtraData->immovables_floor,
            'immovables_count_floor' => $accountExtraData->immovables_count_floor,
            'immovables_city' => $accountExtraData->immovables_city,
            'immovables_district' => $accountExtraData->immovables_district,
            'immovables_purchase_date' => $accountExtraData->immovables_purchase_date,
            'auto_transport_type' => $accountExtraData->auto_transport_type,
            'auto_brand_id' => $accountExtraData->auto_brand_id,
            'auto_brand' => $accountExtraData->auto_brand,
            'auto_model' => $accountExtraData->auto_model,
            'auto_modification' => $accountExtraData->auto_modification,
            'auto_color' => $accountExtraData->auto_color,
            'auto_year' => $accountExtraData->auto_year,
            'auto_engine_size' => $accountExtraData->auto_engine_size,
            'auto_region' => $accountExtraData->auto_region,
            'auto_mileage' => $accountExtraData->auto_mileage,
            'auto_purchase_date' => $accountExtraData->auto_purchase_date,
        );
    }
}
