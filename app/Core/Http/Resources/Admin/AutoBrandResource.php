<?php

namespace App\Http\Controllers\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoBrandResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}