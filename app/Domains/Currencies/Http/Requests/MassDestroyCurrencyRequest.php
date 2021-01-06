<?php

namespace Domains\Currencies\Http\Requests;

use Domains\Currencies\Models\Currency;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules() : array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:currencies,id',
        ];
    }
}
