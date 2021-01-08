<?php

namespace Domains\Users\Http\Resources;

use Parents\Resources\Resource;

class PermissionResource extends Resource
{
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'title' => $this->title
        );
    }
}
