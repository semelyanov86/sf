<?php

namespace App\Http\Requests;

use App\Models\Operation;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateOperationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('operation_edit');
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
