<?php

namespace Domains\Targets\Http\Requests;

use Domains\Targets\Models\Target;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateTargetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('target_edit');
    }

    public function rules(): array
    {
        return [
            'target_category_id' => [
                'required',
                'integer',
            ],
            'target_name'        => [
                'string',
                'min:2',
                'max:190',
                'required',
            ],
            'target_status'      => [
                'required',
            ],
            'amount'             => [
                'required',
            ],
            'first_pay_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pay_to_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
