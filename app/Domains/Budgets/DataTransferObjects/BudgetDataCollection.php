<?php


namespace Domains\Budgets\DataTransferObjects;


use Domains\Budgets\Models\Budget;
use Illuminate\Support\Collection;

class BudgetDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): BudgetData
    {
        return parent::current();
    }

    /**
     * @param  Budget[]  $data
     * @return BudgetDataCollection
     */
    public static function fromArray(array $data): BudgetDataCollection
    {
        return new self(
            array_map(fn(Budget $item) => BudgetData::fromModel($item), $data)
        );
    }

    /**
     * @param  Collection  $data
     * @return BudgetDataCollection
     */
    public static function fromCollection(Collection $data): BudgetDataCollection
    {
        $newData = $data->map(fn(Budget $item) => BudgetData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
