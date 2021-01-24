<?php


namespace Domains\Users\Http\Requests;


class ShowUserRequest extends \Parents\Requests\Request
{
    /**
     * @return  bool
     */
    public function authorize(): bool
    {
        return $this->check('user_show');
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
