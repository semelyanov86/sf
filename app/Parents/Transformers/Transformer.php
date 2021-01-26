<?php


namespace Parents\Transformers;


use Domains\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Parents\DataTransferObjects\ObjectData;

abstract class Transformer extends \League\Fractal\TransformerAbstract
{
    public function user(): User|\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }
    /**
     * @param $adminResponse
     * @param $clientResponse
     *
     * @return  array
     */
    public function ifAdmin($adminResponse, $clientResponse)
    {
        $user = $this->user();

        if (!is_null($user) && $user->is_admin) {
            return array_merge($clientResponse, $adminResponse);
        }

        return $clientResponse;
    }

}
