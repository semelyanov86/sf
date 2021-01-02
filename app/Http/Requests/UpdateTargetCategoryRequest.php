<?php

namespace App\Http\Requests;

use App\Models\TargetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTargetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('target_category_edit');
    }

    public function rules()
    {
        return [
            'target_category_name' => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'target_category_type' => [
                'required',
            ],
        ];
    }
}
