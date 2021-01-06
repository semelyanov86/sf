<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('bank_create');
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
