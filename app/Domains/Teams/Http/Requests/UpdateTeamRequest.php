<?php

namespace Domains\Teams\Http\Requests;

use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('team_edit');
    }

    public function rules() : array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
