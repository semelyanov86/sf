<?php

namespace Domains\Targets\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Domains\Targets\Enums\TargetStatusEnum;
use Domains\Targets\Enums\TypeSelectEnum;
use Domains\Targets\Models\Target;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreTargetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('target_create');
    }

    public function rules(): array
    {
        return [
            'target_category_id' => [
                'required',
                'integer',
                'exists:Domains\Targets\Models\TargetCategory,id'
            ],
            'target_name'        => [
                'string',
                'min:2',
                'max:190',
                'required',
            ],
            'target_status'      => [
                'required',
                new EnumValue(TargetStatusEnum::class)
            ],
            'amount'             => [
                'required',
                'numeric'
            ],
            'first_pay_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pay_to_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'target_type' => [
                'required',
                new EnumValue(TypeSelectEnum::class)
            ],
            'monthly_pay_amount' => [
                'nullable',
                'numeric'
            ],
            'description' => [
                'nullable',
                'min:5',
                'max:500'
            ],
            'target_is_done' => [
                'nullable',
                'boolean'
            ],
            'currency_id' => [
                'nullable',
                'integer',
                'exists:Domains\Currencies\Models\Currency,id'
            ],
            'account_from_id' => [
                'nullable',
                'integer',
                'exists:Domains\Accounts\Models\Account,id'
            ],
            'user_id' => [
                'nullable',
                'integer'
            ]
        ];
    }
}
