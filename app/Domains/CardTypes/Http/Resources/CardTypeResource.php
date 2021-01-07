<?php

namespace Domains\CardTypes\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class CardTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
