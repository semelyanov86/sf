<?php

namespace Domains\Accounts\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Domains\Accounts\Enums\AccountCreditPaymentTypeSelect;
use Domains\Accounts\Enums\AccountDepositTypeSelectEnum;
use Domains\Accounts\Enums\AccountInterestPeriodSelect;
use Domains\Accounts\Enums\AccountStateEnum;
use Domains\Accounts\Enums\AutoFuelTypeSelect;
use Domains\Accounts\Enums\AutoTransmissionTypeSelect;
use Domains\Accounts\Enums\ImmovablesEstateTypeSelectEnum;
use Domains\Accounts\Models\Account;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('account_create');
    }

    public function rules(): array
    {
        return [
            'name'          => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'description' => [
                'string',
                'min:5',
                'max:190',
                'nullable'
            ],
            'state'         => [
                'required',
                new EnumValue(AccountStateEnum::class)
            ],
            'start_balance' => [
                'required',
                'numeric'
            ],
            'market_value'  => [
                'required',
                'numeric'
            ],
            'extra_prefix'  => [
                'string',
                'min:1',
                'max:10',
                'nullable',
            ],
            'account_type_id' => [
                'required',
                'integer',
                'exists:Domains\Accounts\Models\AccountType,id'
            ],
            'currency_id' => [
                'required',
                'integer',
                'exists:Domains\Currencies\Models\Currency,id'
            ],
            'account_deposit_type' => [
                'nullable',
                new EnumValue(AccountDepositTypeSelectEnum::class)
            ],
            'immovables_estate_type' => [
                'nullable',
                new EnumValue(ImmovablesEstateTypeSelectEnum::class)
            ],
            'account_credit_payment_type' => [
                'nullable',
                new EnumValue(AccountCreditPaymentTypeSelect::class)
            ],
            'auto_transmission_type' => [
                'nullable',
                new EnumValue(AutoTransmissionTypeSelect::class)
            ],
            'auto_fuel_type' => [
                'nullable',
                new EnumValue(AutoFuelTypeSelect::class)
            ],
            'account_interest_period' => [
                'nullable',
                new EnumValue(AccountInterestPeriodSelect::class)
            ],
            'card_type_id' => [
                'nullable',
                'integer',
                'exists:Domains\CardTypes\Models\CardType,id'
            ],
            'card_expire_date' => [
                'nullable',
                'date'
            ],
            'card_year_cost' => [
                'nullable',
                'numeric'
            ],
            'card_rate_balance' => [
                'nullable',
                'numeric'
            ],
            'card_atm_commission' => [
                'nullable',
                'numeric'
            ],
            'card_other_atm_commission' => [
                'nullable', 'numeric'
            ],
            'card_credit_limit' => ['nullable', 'numeric'],
            'card_credit_grace_period'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'card_credit_min_payment_percent'    => [
                'numeric', 'nullable'
            ],
            'card_credit_min_payment_day'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'account_open_date'                  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'account_interest_rate'              => [
                'numeric', 'nullable'
            ],
            'account_close_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'account_credit_one_time_commission' => [
                'numeric', 'nullable'
            ],
            'account_credit_monthly_commission'  => [
                'numeric', 'nullable'
            ],
            'account_credit_payment_day'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'loan_give_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'loan_take_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'loan_debitor_phone'                 => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'loan_interest_rate'                 => [
                'numeric', 'nullable'
            ],
            'immovables_living_space'            => [
                'numeric', 'nullable'
            ],
            'immovables_usable_space'            => [
                'numeric', 'nullable'
            ],
            'immovables_landing_plot'            => [
                'numeric', 'nullable'
            ],
            'immovables_distance_to_city'        => [
                'numeric', 'nullable'
            ],
            'immovables_floor'                   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'immovables_count_floor'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'immovables_city'                    => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'immovables_district'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'immovables_purchase_date'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'auto_transport_type'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_model'                         => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_modification'                  => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_color'                         => [
                'string',
                'nullable',
            ],
            'auto_year'                          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'auto_engine_size'                   => [
                'numeric', 'nullable'
            ],
            'auto_region'                        => [
                'string',
                'nullable',
            ],
            'auto_mileage'                       => [
                'numeric', 'nullable'
            ],
            'auto_purchase_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
