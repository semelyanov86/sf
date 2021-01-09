<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\User;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('user_edit');
    }

    public function rules(): array
    {
        /** @psalm-suppress all */
        return [
            'name'              => [
                'string',
                'required',
            ],
            'email'             => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*'           => [
                'integer',
            ],
            'roles'             => [
                'required',
                'array',
            ],
            'login'             => [
                'string',
                'min:2',
                'max:190',
                'required',
                'unique:users,login,' . request()->route('user')->id,
            ],
            'operations_number' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'budget_day_start'  => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'primary_currency'  => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'timezone'          => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'phone'             => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'mail_days_before'  => [
                'required',
            ],
            'mail_time'         => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'sms_days_before'   => [
                'required',
            ],
            'sms_time'          => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
