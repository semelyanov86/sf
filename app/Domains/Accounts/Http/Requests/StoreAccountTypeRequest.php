<?php

namespace Domains\Accounts\Http\Requests;

use Domains\Accounts\Models\AccountType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreAccountTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('account_type_create');
    }

    public function rules(): array
    {
        return [
            'data' => 'required|array',
            'data.type' => 'required|in:AccountType',
            'data.attributes' => 'required|array',
            'data.attributes.name'               => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:account_types',
            ],
            'data.attributes.parent_description' => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
        ];
    }
}
