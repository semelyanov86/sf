<?php

namespace Domains\Categories\Http\Requests;

use Domains\Categories\Models\HiddenCategory;
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
                'exists:Domains\Categories\Models\Category,id'
            ],
            'user_id'     => [
                'required',
                'integer',
                'exists:Domains\Users\Models\User,id'
            ],
        ];
    }
}
