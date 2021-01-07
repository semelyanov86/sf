<?php

namespace Domains\Targets\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class TargetResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
