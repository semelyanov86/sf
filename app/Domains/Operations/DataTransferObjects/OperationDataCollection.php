<?php


namespace Domains\Operations\DataTransferObjects;


use Domains\Operations\Models\Operation;
use Illuminate\Support\Collection;

final class OperationDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): OperationData
    {
        return parent::current();
    }

    /**
     * @param  Operation[]  $data
     * @return OperationDataCollection
     */
    public static function fromArray(array $data): OperationDataCollection
    {
        return new self(
            array_map(fn(Operation $item) => OperationData::fromModel($item), $data)
        );
    }

    /**
     * @param  Collection  $data
     * @return OperationDataCollection
     */
    public static function fromCollection(Collection $data): OperationDataCollection
    {
        $newData = $data->map(fn(Operation $item) => OperationData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }

}
