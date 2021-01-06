<?php

namespace Domains\Countries\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
