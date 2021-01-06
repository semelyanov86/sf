<?php

namespace App\Http\Requests;

use App\Models\HiddenCategory;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateHiddenCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('hidden_category_edit');
    }

    public function rules(): array
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
