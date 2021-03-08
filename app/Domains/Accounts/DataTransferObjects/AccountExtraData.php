<?php
declare(strict_types=1);

namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Enums\AccountCreditPaymentTypeSelect;
use Domains\Accounts\Enums\AccountDepositTypeSelectEnum;
use Domains\Accounts\Enums\AccountInterestPeriodSelect;
use Domains\Accounts\Enums\AutoFuelTypeSelect;
use Domains\Accounts\Enums\AutoTransmissionTypeSelect;
use Domains\Accounts\Enums\ImmovablesEstateTypeSelectEnum;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\StoreAccountsExtraRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountsExtraRequest;
use Domains\Accounts\Models\AccountsExtra;
use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\Transformers\AutoBrandTransformer;
use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Illuminate\Support\Carbon;
use Parents\ValueObjects\MoneyValueObject;

class AccountExtraData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public ?AccountDepositTypeSelectEnum $account_deposit_type;

    public ?ImmovablesEstateTypeSelectEnum $immovables_estate_type;

    public ?AccountCreditPaymentTypeSelect $account_credit_payment_type;

    public ?AutoTransmissionTypeSelect $auto_transmission_type;

    public ?AutoFuelTypeSelect $auto_fuel_type;

    public ?AccountInterestPeriodSelect $account_interest_period;

    public ?int $card_type_id;

    public ?CardTypeData $card_type;

    public ?Carbon $card_expire_date;

    public ?MoneyValueObject $card_year_cost;

    public ?float $card_rate_balance;

    public ?float $card_atm_commission;

    public ?float $card_other_atm_commission;

    public ?MoneyValueObject $card_credit_limit;

    public ?float $card_credit_interest_rate;

    public ?int $card_credit_grace_period;

    public ?float $card_credit_min_payment_percent;

    public ?float $card_credit_min_payment_day;

    public ?float $card_credit_annual_service_cost;

    public ?Carbon $account_open_date;

    public ?float $account_interest_rate;

    public ?Carbon $account_close_date;

    public ?bool $account_is_capitalization;

    public ?float $account_credit_one_time_commission;

    public ?float $account_credit_monthly_commission;

    public ?int $account_credit_payment_day;

    public ?Carbon $loan_give_date;

    public ?Carbon $loan_take_date;

    public ?string $loan_debitor_email;

    public ?string $loan_debitor_phone;

    public ?float $loan_interest_rate;

    public ?float $immovables_living_space;

    public ?float $immovables_usable_space;

    public ?float $immovables_landing_plot;

    public ?float $immovables_distance_to_city;

    public ?int $immovables_floor;

    public ?int $immovables_count_floor;

    public ?string $immovables_city;

    public ?string $immovables_district;

    public ?Carbon $immovables_purchase_date;

    public ?string $auto_transport_type;

    public ?int $auto_brand_id;

    public ?AutoBrandData $auto_brand;

    public ?string $auto_model;

    public ?string $auto_modification;

    public ?string $auto_color;

    public ?int $auto_year;

    public ?float $auto_engine_size;

    public ?string $auto_region;

    public ?float $auto_mileage;

    public ?Carbon $auto_purchase_date;

    public static function fromRequest(StoreAccountRequest|UpdateAccountRequest $request): self
    {
        return new self([
            'account_deposit_type' => $request->input('data.attributes.account_deposit_type') ?
                AccountDepositTypeSelectEnum::fromValue(intval(
                    $request->input('data.attributes.account_deposit_type'))
                ) :
                null,
            'immovables_estate_type' => $request->input('data.attributes.immovables_estate_type') ?
                ImmovablesEstateTypeSelectEnum::fromValue(
                    intval($request->input('data.attributes.immovables_estate_type'))
                ) : null,
            'account_credit_payment_type' => $request->input('data.attributes.account_credit_payment_type') ?
                AccountCreditPaymentTypeSelect::fromValue(
                    intval($request->input('data.attributes.account_credit_payment_type'))
                ) : null,
            'auto_transmission_type' => $request->input('data.attributes.auto_transmission_type') ?
                AutoTransmissionTypeSelect::fromValue(
                    intval($request->input('data.attributes.auto_transmission_type'))
                ) : null,
            'auto_fuel_type' => $request->input('data.attributes.auto_fuel_type') ?
                AutoFuelTypeSelect::fromValue(intval($request->input('data.attributes.auto_fuel_type'))) : null,
            'account_interest_period' => $request->input('data.attributes.account_interest_period') ?
                AccountInterestPeriodSelect::fromValue(
                    intval($request->input('data.attributes.account_interest_period'))
                ) : null,
            'card_type_id' => $request->input('data.attributes.card_type_id') ?
                intval($request->input('data.attributes.card_type_id')) : null,
            'card_expire_date' => $request->input('data.attributes.card_expire_date') ?
                Carbon::createFromFormat(config('panel.date_format'),
                    $request->input('data.attributes.card_expire_date')) : null,
            'card_year_cost' => $request->input('data.attributes.card_year_cost') ?
                MoneyValueObject::fromFloat($request->input('data.attributes.card_year_cost')) : null,
            'card_rate_balance' => floatval($request->input('data.attributes.card_rate_balance')),
            'card_atm_commission' => floatval($request->input('data.attributes.card_atm_commission')),
            'card_other_atm_commission' => floatval($request->input('data.attributes.card_other_atm_commission')),
            'card_credit_limit' => $request->input('data.attributes.card_credit_limit') ?
                MoneyValueObject::fromFloat($request->input('data.attributes.card_credit_limit')) : null,
            'card_credit_interest_rate' => floatval($request->input('data.attributes.card_credit_interest_rate')),
            'card_credit_grace_period' => intval($request->input('data.attributes.card_credit_grace_period')),
            'card_credit_min_payment_percent' => floatval(
                $request->input('data.attributes.card_credit_min_payment_percent')
            ),
            'card_credit_min_payment_day' => floatval(
                $request->input('data.attributes.card_credit_min_payment_day')
            ),
            'card_credit_annual_service_cost' => floatval(
                $request->input('data.attributes.card_credit_annual_service_cost')
            ),
            'account_open_date' => $request->input('data.attributes.account_open_date') ?
                Carbon::createFromFormat(
                    config('panel.date_format'),
                    $request->input('data.attributes.account_open_date')) :
                null,
            'account_interest_rate' => floatval($request->input('data.attributes.account_interest_rate')),
            'account_close_date' => $request->input('data.attributes.account_close_date') ?
                Carbon::createFromFormat(
                    config('panel.date_format'), $request->input('data.attributes.account_close_date')
                ) : null,
            'account_is_capitalization' => $request->boolean('data.attributes.account_is_capitalization'),
            'account_credit_one_time_commission' => floatval(
                $request->input('data.attributes.account_credit_one_time_commission')
            ),
            'account_credit_monthly_commission' => floatval(
                $request->input('data.attributes.account_credit_monthly_commission')
            ),
            'account_credit_payment_day' => intval($request->input('data.attributes.account_credit_payment_day')),
            'loan_give_date' => $request->input('data.attributes.loan_give_date') ?
                Carbon::createFromFormat(config('panel.date_format'),
                    $request->input('data.attributes.loan_give_date')) : null,
            'loan_take_date' => $request->input('data.attributes.loan_take_date') ?
                Carbon::createFromFormat(config('panel.date_format'),
                    $request->input('data.attributes.loan_take_date')) : null,
            'loan_debitor_email' => $request->input('data.attributes.loan_debitor_email'),
            'loan_debitor_phone' => $request->input('data.attributes.loan_debitor_phone'),
            'loan_interest_rate' => floatval($request->input('data.attributes.loan_interest_rate')),
            'immovables_living_space' => floatval($request->input('data.attributes.immovables_living_space')),
            'immovables_usable_space' => floatval($request->input('data.attributes.immovables_usable_space')),
            'immovables_landing_plot' => floatval($request->input('data.attributes.immovables_landing_plot')),
            'immovables_distance_to_city' => floatval($request->input('data.attributes.immovables_distance_to_city')),
            'immovables_floor' => intval($request->input('data.attributes.immovables_floor')),
            'immovables_count_floor' => intval($request->input('data.attributes.immovables_count_floor')),
            'immovables_city' => $request->input('data.attributes.immovables_city'),
            'immovables_district' => $request->input('data.attributes.immovables_district'),
            'immovables_purchase_date' => $request->input('data.attributes.immovables_purchase_date') ?
                Carbon::createFromFormat(config('panel.date_format'),
                    $request->input('data.attributes.immovables_purchase_date')) : null,
            'auto_transport_type' => $request->input('data.attributes.auto_transport_type'),
            'auto_brand_id' => $request->input('data.attributes.auto_brand_id') ? intval($request->input('data.attributes.auto_brand_id')) : null,
            'auto_model' => $request->input('data.attributes.auto_model'),
            'auto_modification' => $request->input('data.attributes.auto_modification'),
            'auto_color' => $request->input('data.attributes.auto_color'),
            'auto_year' => intval($request->input('data.attributes.auto_year')),
            'auto_engine_size' => floatval($request->input('data.attributes.auto_engine_size')),
            'auto_region' => $request->input('data.attributes.auto_region'),
            'auto_mileage' => floatval($request->input('data.attributes.auto_mileage')),
            'auto_purchase_date' => $request->input('data.attributes.auto_purchase_date') ?
                Carbon::createFromFormat(config('panel.date_format'),
                    $request->input('data.attributes.auto_purchase_date')) : null,
        ]);
    }

    public static function fromModel(AccountsExtra $accountsExtra): self
    {
        return new self([
            'id' => $accountsExtra->id,
            'account_deposit_type' => $accountsExtra->account_deposit_type ? AccountDepositTypeSelectEnum::fromValue($accountsExtra->account_deposit_type) : null,
            'immovables_estate_type' => $accountsExtra->immovables_estate_type ? ImmovablesEstateTypeSelectEnum::fromValue(intval($accountsExtra->immovables_estate_type)) : null,
            'account_credit_payment_type' => $accountsExtra->account_credit_payment_type ? AccountCreditPaymentTypeSelect::fromValue(intval($accountsExtra->account_credit_payment_type)) : null,
            'auto_transmission_type' => $accountsExtra->auto_transmission_type ? AutoTransmissionTypeSelect::fromValue(intval($accountsExtra->auto_transmission_type)) : null,
            'auto_fuel_type' => $accountsExtra->auto_fuel_type ? AutoFuelTypeSelect::fromValue(intval($accountsExtra->auto_fuel_type)) : null,
            'account_interest_period' => $accountsExtra->account_interest_period ? AccountInterestPeriodSelect::fromValue(intval($accountsExtra->account_interest_period)) : null,
            'card_type_id' => $accountsExtra->card_type_id ? intval($accountsExtra->card_type_id) : null,
            'card_expire_date' => $accountsExtra->card_expire_date ? Carbon::createFromFormat(config('panel.date_format'), $accountsExtra->card_expire_date) : null,
            'card_year_cost' => $accountsExtra->card_year_cost,
            'card_rate_balance' => floatval($accountsExtra->card_rate_balance),
            'card_atm_commission' => floatval($accountsExtra->card_atm_commission),
            'card_other_atm_commission' => floatval($accountsExtra->card_other_atm_commission),
            'card_credit_limit' => $accountsExtra->card_credit_limit,
            'card_credit_interest_rate' => floatval($accountsExtra->card_credit_interest_rate),
            'card_credit_grace_period' => intval($accountsExtra->card_credit_grace_period),
            'card_credit_min_payment_percent' => floatval($accountsExtra->card_credit_min_payment_percent),
            'card_credit_min_payment_day' => floatval($accountsExtra->card_credit_min_payment_day),
            'card_credit_annual_service_cost' => floatval($accountsExtra->card_credit_annual_service_cost),
            'account_open_date' => $accountsExtra->account_open_date,
            'account_interest_rate' => floatval($accountsExtra->account_interest_rate),
            'account_close_date' => $accountsExtra->account_close_date,
            'account_is_capitalization' => boolval($accountsExtra->account_is_capitalization),
            'account_credit_one_time_commission' => floatval($accountsExtra->account_credit_one_time_commission),
            'account_credit_monthly_commission' => floatval($accountsExtra->account_credit_monthly_commission),
            'account_credit_payment_day' => intval($accountsExtra->account_credit_payment_day),
            'loan_give_date' => $accountsExtra->loan_give_date,
            'loan_take_date' => $accountsExtra->loan_take_date,
            'loan_debitor_email' => $accountsExtra->loan_debitor_email,
            'loan_debitor_phone' => $accountsExtra->loan_debitor_phone,
            'loan_interest_rate' => floatval($accountsExtra->loan_interest_rate),
            'immovables_living_space' => floatval($accountsExtra->immovables_living_space),
            'immovables_usable_space' => floatval($accountsExtra->immovables_usable_space),
            'immovables_landing_plot' => floatval($accountsExtra->immovables_landing_plot),
            'immovables_distance_to_city' => floatval($accountsExtra->immovables_distance_to_city),
            'immovables_floor' => intval($accountsExtra->immovables_floor),
            'immovables_count_floor' => intval($accountsExtra->immovables_count_floor),
            'immovables_city' => $accountsExtra->immovables_city,
            'immovables_district' => $accountsExtra->immovables_district,
            'immovables_purchase_date' => $accountsExtra->immovables_purchase_date,
            'auto_transport_type' => $accountsExtra->auto_transport_type,
            'auto_brand_id' => $accountsExtra->auto_brand_id ? intval($accountsExtra->auto_brand_id) : null,
            'auto_brand' => $accountsExtra->auto_brand ? AutoBrandData::fromModel($accountsExtra->auto_brand) : null,
            'auto_model' => $accountsExtra->auto_model,
            'auto_modification' => $accountsExtra->auto_modification,
            'auto_color' => $accountsExtra->auto_color,
            'auto_year' => intval($accountsExtra->auto_year),
            'auto_engine_size' => floatval($accountsExtra->auto_engine_size),
            'auto_region' => $accountsExtra->auto_region,
            'auto_mileage' => floatval($accountsExtra->auto_mileage),
            'auto_purchase_date' => $accountsExtra->auto_purchase_date,
        ]);
    }
}
