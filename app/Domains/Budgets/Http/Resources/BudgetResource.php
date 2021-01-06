<?php

namespace Domains\Budgets\Http\Resources;

use Parents\Resources\Resource as JsonResource;

class BudgetResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
