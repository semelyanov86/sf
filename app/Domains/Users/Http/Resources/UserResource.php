<?php

namespace Domains\Users\Http\Resources;

use Domains\Teams\Http\Resources\TeamResource;
use Parents\Resources\Resource;

class UserResource extends Resource
{
    public function toArray($request): array
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'operations_number' => $this->operations_number,
            'budget_day_start' => $this->budget_day_start,
            'primary_currency' => $this->currency,
            'timezone' => $this->timezone,
            'language' => $this->language,
            'team' => new TeamResource($this->team),
            'role' => RoleResource::collection($this->roles)
        );
    }
}
