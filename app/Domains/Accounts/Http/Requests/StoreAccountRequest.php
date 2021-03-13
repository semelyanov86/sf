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
            'data' => 'required|array',
            'data.type' => 'required|in:Account',
            'data.attributes' => 'required|array',
            'data.attributes.name'          => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'data.attributes.description' => [
                'string',
                'min:5',
                'max:230',
                'nullable'
            ],
            'data.attributes.state'         => [
                'required',
                new EnumValue(AccountStateEnum::class)
            ],
            'data.attributes.start_balance' => [
                'required',
                'numeric'
            ],
            'data.attributes.market_value'  => [
                'required',
                'numeric'
            ],
            'data.attributes.extra_prefix'  => [
                'string',
                'min:1',
                'max:10',
                'nullable',
            ],
            'data.attributes.account_type_id' => [
                'required',
                'integer',
                'exists:Domains\Accounts\Models\AccountType,id'
            ],
            'data.attributes.currency_id' => [
                'required',
                'integer',
                'exists:Domains\Currencies\Models\Currency,id'
            ],
            'data.attributes.account_deposit_type' => [
                'nullable',
                new EnumValue(AccountDepositTypeSelectEnum::class)
            ],
            'data.attributes.immovables_estate_type' => [
                'nullable',
                new EnumValue(ImmovablesEstateTypeSelectEnum::class)
            ],
            'data.attributes.account_credit_payment_type' => [
                'nullable',
                new EnumValue(AccountCreditPaymentTypeSelect::class)
            ],
            'data.attributes.auto_transmission_type' => [
                'nullable',
                new EnumValue(AutoTransmissionTypeSelect::class)
            ],
            'data.attributes.auto_fuel_type' => [
                'nullable',
                new EnumValue(AutoFuelTypeSelect::class)
            ],
            'data.attributes.account_interest_period' => [
                'nullable',
                new EnumValue(AccountInterestPeriodSelect::class)
            ],
            'data.attributes.card_type_id' => [
                'nullable',
                'integer',
                'exists:Domains\CardTypes\Models\CardType,id'
            ],
            'data.attributes.card_expire_date' => [
                'nullable',
                'date'
            ],
            'data.attributes.card_year_cost' => [
                'nullable',
                'numeric'
            ],
            'data.attributes.card_rate_balance' => [
                'nullable',
                'numeric'
            ],
            'data.attributes.card_atm_commission' => [
                'nullable',
                'numeric'
            ],
            'data.attributes.card_other_atm_commission' => [
                'nullable', 'numeric'
            ],
            'data.attributes.card_credit_limit' => ['nullable', 'numeric'],
            'data.attributes.card_credit_grace_period'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.card_credit_min_payment_percent'    => [
                'numeric', 'nullable'
            ],
            'data.attributes.card_credit_min_payment_day'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.account_open_date'                  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data.attributes.account_interest_rate'              => [
                'numeric', 'nullable'
            ],
            'data.attributes.account_close_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data.attributes.account_credit_one_time_commission' => [
                'numeric', 'nullable'
            ],
            'data.attributes.account_credit_monthly_commission'  => [
                'numeric', 'nullable'
            ],
            'data.attributes.account_credit_payment_day'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.loan_give_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data.attributes.loan_take_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data.attributes.loan_debitor_phone'                 => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'data.attributes.loan_interest_rate'                 => [
                'numeric', 'nullable'
            ],
            'data.attributes.immovables_living_space'            => [
                'numeric', 'nullable'
            ],
            'data.attributes.immovables_usable_space'            => [
                'numeric', 'nullable'
            ],
            'data.attributes.immovables_landing_plot'            => [
                'numeric', 'nullable'
            ],
            'data.attributes.immovables_distance_to_city'        => [
                'numeric', 'nullable'
            ],
            'data.attributes.immovables_floor'                   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.immovables_count_floor'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.immovables_city'                    => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'data.attributes.immovables_district'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'data.attributes.immovables_purchase_date'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data.attributes.auto_transport_type'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'data.attributes.auto_model'                         => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'data.attributes.auto_modification'                  => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'data.attributes.auto_color'                         => [
                'string',
                'nullable',
            ],
            'data.attributes.auto_year'                          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data.attributes.auto_engine_size'                   => [
                'numeric', 'nullable'
            ],
            'data.attributes.auto_region'                        => [
                'string',
                'nullable',
            ],
            'data.attributes.auto_mileage'                       => [
                'numeric', 'nullable'
            ],
            'data.attributes.auto_purchase_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
