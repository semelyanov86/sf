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

class EditAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('account_edit');
    }

    public function rules(): array
    {
        return [
        ];
    }
}
