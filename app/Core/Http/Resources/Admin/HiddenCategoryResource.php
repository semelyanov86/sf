<?php

namespace App\Http\Controllers\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class HiddenCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
