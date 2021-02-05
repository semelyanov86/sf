<?php


namespace Domains\Banks\DataTransferObjects;


use Domains\Banks\Models\Bank;
use Illuminate\Support\Collection;

final class BankDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): BankData
    {
        return parent::current();
    }

    /**
     * @param  Bank[]  $data
     * @return BankDataCollection
     */
    public static function fromArray(array $data): BankDataCollection
    {
        return new self(
            array_map(fn(Bank $item) => BankData::fromModel($item), $data)
        );
    }

    /**
     * @param  Bank[]  $data
     * @return BankDataCollection
     */
    public static function fromCollection(Collection $data): BankDataCollection
    {
        $newData = $data->map(fn(Bank $item) => BankData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }

}
