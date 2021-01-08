<?php

namespace Domains\Users\Http\Resources;

use Parents\Resources\Resource;

class RoleResource extends Resource
{
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'permissions' => PermissionResource::collection($this->permissions)
        );
    }
}
