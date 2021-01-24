<?php


namespace Domains\Users\Http\Requests;


class CreateUserRequest extends \Parents\Requests\Request
{
    /**
     * @return  bool
     */
    public function authorize(): bool
    {
        return $this->check('user_create');
    }

    /**
     * @return  array
     */
    public function rules(): array
    {
        return [
            // put your rules here
        ];
    }
}
