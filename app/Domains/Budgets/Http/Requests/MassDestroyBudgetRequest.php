<?php

namespace Domains\Budgets\Http\Requests;

use Domains\Budgets\Models\Budget;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBudgetRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:budgets,id',
        ];
    }
}
