<?php

namespace Domains\Accounts\Http\Requests;

use Domains\Accounts\Models\AccountType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccountTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('account_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:account_types,id',
        ];
    }
}
