<?php

namespace App\Http\Controllers\Requests;

use App\Models\AccountsExtra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccountsExtraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('accounts_extra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:accounts_extras,id',
        ];
    }
}
