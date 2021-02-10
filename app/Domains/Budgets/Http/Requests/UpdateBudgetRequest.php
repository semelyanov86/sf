<?php

namespace Domains\Budgets\Http\Requests;

use Domains\Budgets\Models\Budget;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('budget_edit');
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
                'required',
                'integer',
            ],
        ];
    }
}
