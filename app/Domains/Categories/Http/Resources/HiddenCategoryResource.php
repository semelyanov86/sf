<?php

namespace Domains\Categories\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class HiddenCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
