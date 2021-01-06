<?php

namespace Domains\Banks\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class BankResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
