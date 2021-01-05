<?php

namespace App\Http\Controllers\Requests;

use App\Models\HiddenCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHiddenCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hidden_category_edit');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'user_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}
