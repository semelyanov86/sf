<?php

namespace Domains\Accounts\Http\Requests;

use Domains\Accounts\Models\Account;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:accounts,id',
        ];
    }
}
