<?php

namespace Domains\Budgets\Http\Requests;

use Domains\Budgets\Models\Budget;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreBudgetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('budget_create');
    }

    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'plan'        => [
                'required',
                'numeric'
            ],
            'user_id'     => [
                'nullable',
                'integer',
            ],
        ];
    }
}
