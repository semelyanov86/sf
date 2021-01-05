<?php

namespace Domains\Users\Http\Resources;

use Parents\Resources\Resource;

class UserResource extends Resource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
