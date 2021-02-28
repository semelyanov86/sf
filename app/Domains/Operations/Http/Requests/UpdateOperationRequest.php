<?php

namespace Domains\Operations\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Domains\Operations\Enums\TypeSelectEnum;
use Domains\Operations\Models\Operation;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateOperationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('operation_edit');
    }

    public function rules(): array
    {
        return [
            'amount'     => [
                'required',
                'numeric'
            ],
            'done_at'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type'       => [
                'required',
                new EnumValue(TypeSelectEnum::class)
            ],
            'cal_repeat' => [
                'nullable',
                'integer',
                'min:1',
                'max:360',
            ],
            'source_account_id' => [
                'required',
                'exists:Domains\Accounts\Models\Account,id'
            ],
            'to_account_id' => [
                'nullable',
                'exists:Domains\Accounts\Models\Account,id'
            ],
            'description' => [
                'nullable',
                'min:3', 'max:500'
            ],
            'related_transactions' => [
                'nullable', 'min:10'
            ],
            'google_sync' => [
                'nullable', 'boolean'
            ],
            'remind_operation' => [
                'nullable', 'boolean'
            ],
            'is_calendar' => [
                'nullable', 'boolean'
            ],
            'category_id' => [
                'required', 'exists:Domains\Categories\Models\Category,id'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('type'))
            $this->merge(['type' => intval($this->type)]);
    }
}
