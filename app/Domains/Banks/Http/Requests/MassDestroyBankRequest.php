<?php

namespace Domains\Banks\Http\Requests;

use Domains\Banks\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:banks,id',
        ];
    }
}
