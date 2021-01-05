<?php

namespace App\Http\Controllers\Requests;

use App\Models\CardType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCardTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('card_type_create');
    }

    public function rules()
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
