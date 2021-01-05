<?php

namespace App\Http\Controllers\Requests;

use App\Models\AutoBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAutoBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('auto_brand_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:auto_brands,name,' . request()->route('auto_brand')->id,
            ],
        ];
    }
}
