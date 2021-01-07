<?php

namespace Domains\Operations\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class OperationResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
