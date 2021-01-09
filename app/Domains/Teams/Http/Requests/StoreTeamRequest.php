<?php

namespace Domains\Teams\Http\Requests;

use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('team_create');
    }

    /**
     * @return string[][]
     *
     * @psalm-return array{name: array{0: string, 1: string}}
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
