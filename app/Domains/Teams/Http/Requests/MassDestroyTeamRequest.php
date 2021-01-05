<?php

namespace Domains\Teams\Http\Requests;

use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules() : array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:teams,id',
        ];
    }
}
