<?php


namespace Domains\Budgets\Actions;


use Domains\Budgets\DataTransferObjects\BudgetDataCollection;
use Domains\Budgets\Models\Budget;
use Domains\Budgets\ViewModels\BudgetListViewModel;

class GetAllBudgetsAction extends \Parents\Actions\Action
{
    public function __invoke(): BudgetListViewModel
    {
        $budgets = Budget::with(['category', 'user', 'team'])->get();
        return new BudgetListViewModel(BudgetDataCollection::fromCollection($budgets));
    }
}
