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
            'card_credit_interest_rate' => ['nullable', 'numeric']
        ];
    }
}
