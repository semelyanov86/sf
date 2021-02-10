<?php


namespace Domains\Budgets\Actions;


use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Models\Budget;
use Domains\Budgets\ViewModels\BudgetViewModel;

class UpdateBudgetAction extends \Parents\Actions\Action
{
    public function __invoke(Budget $budget, BudgetData $dto): BudgetViewModel
    {
        $budget->update($dto->toArray());
        return new BudgetViewModel(BudgetData::fromModel($budget));
    }
}
