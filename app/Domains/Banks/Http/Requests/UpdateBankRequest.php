<?php

namespace Domains\Banks\Http\Requests;

use Domains\Banks\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('bank_edit');
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
        ];
    }
}
