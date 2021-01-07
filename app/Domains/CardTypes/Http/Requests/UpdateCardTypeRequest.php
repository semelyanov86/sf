<?php

namespace Domains\CardTypes\Http\Requests;

use Domains\CardTypes\Models\CardType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateCardTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('card_type_edit');
    }

    public function rules(): array
    {
        return [
            'name'        => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:card_types,name,' . request()->route('card_type')->id,
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
