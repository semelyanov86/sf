<?php


namespace Domains\Budgets\ViewModels;


use Domains\Budgets\DataTransferObjects\BudgetDataCollection;
use Domains\Budgets\Models\Budget;

final class BudgetListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?BudgetDataCollection $budgetDataCollection
    )
    {}

    public function budgets(): BudgetDataCollection
    {
        return $this->budgetDataCollection ?? BudgetDataCollection::fromCollection(Budget::all());
    }
}
