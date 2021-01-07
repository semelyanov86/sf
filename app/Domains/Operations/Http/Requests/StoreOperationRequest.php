<?php

namespace Domains\Operations\Http\Requests;

use Domains\Operations\Models\Operation;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreOperationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('operation_create');
    }

    public function rules(): array
    {
        return [
            'amount'     => [
                'required',
            ],
            'done_at'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type'       => [
                'required',
            ],
            'cal_repeat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
