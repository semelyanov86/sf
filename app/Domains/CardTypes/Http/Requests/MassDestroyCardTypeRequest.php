<?php

namespace Domains\CardTypes\Http\Requests;

use Domains\CardTypes\Models\CardType;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCardTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('card_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:card_types,id',
        ];
    }
}
