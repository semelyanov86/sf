<?php


namespace Domains\Budgets\ViewModels;


use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Models\Budget;

final class BudgetViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?BudgetData $budgetData
    )
    {}

    public function budget(): BudgetData
    {
        return $this->budgetData ?? BudgetData::fromModel(new Budget());
    }
}
