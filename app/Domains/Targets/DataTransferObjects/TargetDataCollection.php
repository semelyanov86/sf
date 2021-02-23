<?php


namespace Domains\Targets\DataTransferObjects;


use Domains\Targets\Models\Target;
use Illuminate\Support\Collection;

class TargetDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): TargetData
    {
        return parent::current();
    }

    /**
     * @param  Target[]  $data
     * @return TargetDataCollection
     */
    public static function fromArray(array $data): TargetDataCollection
    {
        return new self(
            array_map(fn(Target $item) => TargetData::fromModel($item), $data)
        );
    }

    /**
     * @param  Collection  $data
     * @return TargetDataCollection
     */
    public static function fromCollection(Collection $data): TargetDataCollection
    {
        $newData = $data->map(fn(Target $item) => TargetData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
