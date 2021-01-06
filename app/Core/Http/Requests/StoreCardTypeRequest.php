<?php

namespace App\Http\Requests;

use App\Models\CardType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreCardTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('card_type_create');
    }

    public function rules(): array
    {
        return [
            'name'        => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:card_types',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
