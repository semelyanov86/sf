<?php

namespace App\Http\Requests;

use App\Models\AutoBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAutoBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('auto_brand_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:auto_brands',
            ],
        ];
    }
}
