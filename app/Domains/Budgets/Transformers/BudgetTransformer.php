<?php


namespace Domains\Budgets\Transformers;


use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Categories\Transformers\CategoryTransformer;
use Domains\Teams\Transformers\TeamTransformer;
use Domains\Users\Transformers\UserTransformer;

class BudgetTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['team', 'user', 'category'];

    public function transform(BudgetData $budgetData): array
    {
        return array(
            'id' => $budgetData->id,
            'category_id' => $budgetData->category_id,
            'plan' => $budgetData->plan->toArray(),
            'user_id' => $budgetData->user_id,
            'team_id' => $budgetData->team_id,
            'created_at' => $budgetData->created_at,
        );
    }

    public function includeUser(BudgetData $budgetData): \League\Fractal\Resource\Item
    {
        return $this->item($budgetData->user, new UserTransformer());
    }

    public function includeTeam(BudgetData $budgetData): \League\Fractal\Resource\Item
    {
        return $this->item($budgetData->team, new TeamTransformer());
    }

    public function includeCategory(BudgetData $budgetData): \League\Fractal\Resource\Item
    {
        return $this->item($budgetData->category, new CategoryTransformer());
    }
}
