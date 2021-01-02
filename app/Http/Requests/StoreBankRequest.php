<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_create');
    }

    public function rules()
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
