<?php

namespace Domains\Currencies\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class CurrencyResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
