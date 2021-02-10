<?php


namespace Domains\Budgets\Actions;


use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Models\Budget;
use Domains\Budgets\ViewModels\BudgetViewModel;

class ShowBudgetAction extends \Parents\Actions\Action
{
    public function __invoke(Budget $budget): BudgetViewModel
    {
        return new BudgetViewModel(BudgetData::fromModel($budget));
    }
}
