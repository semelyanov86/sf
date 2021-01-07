<?php

namespace Domains\Accounts\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class AccountTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
