<?php

namespace Domains\Teams\Http\Resources;

use Domains\Users\Http\Resources\UserResource;
use Parents\Resources\Resource;

class TeamResource extends Resource
{
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'owner_id' => $this->owner_id
        );
    }
}
