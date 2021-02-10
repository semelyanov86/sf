<?php


namespace Domains\Budgets\Actions;


use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Models\Budget;
use Domains\Budgets\ViewModels\BudgetViewModel;

class StoreBudgetAction extends \Parents\Actions\Action
{
    public function __invoke(BudgetData $dto): BudgetViewModel
    {
        $budget = Budget::create($dto->toArray());
        return new BudgetViewModel(BudgetData::fromModel($budget));
    }
}
