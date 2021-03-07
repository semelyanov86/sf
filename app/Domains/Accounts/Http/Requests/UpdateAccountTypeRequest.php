<?php

namespace Domains\Accounts\Http\Requests;

use Domains\Accounts\Models\AccountType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateAccountTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('account_type_edit');
    }

    public function rules(): array
    {
        /** @psalm-suppress all */
        $id = request()->route('account_type');
        return [
            'name'               => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:account_types,name,' . $id,
            ],
            'parent_description' => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
        ];
    }
}
