<?php

namespace Domains\Teams\Http\Requests;

use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
