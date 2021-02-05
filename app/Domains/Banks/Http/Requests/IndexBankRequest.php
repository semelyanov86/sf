<?php

namespace Domains\Banks\Http\Requests;

use Domains\Banks\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class IndexBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->check('bank_access');
    }

    public function rules(): array
    {
        return [];
    }
}
