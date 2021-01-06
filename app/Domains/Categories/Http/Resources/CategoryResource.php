<?php

namespace Domains\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
