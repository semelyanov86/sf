<?php


namespace Domains\Targets\DataTransferObjects;


use Domains\Targets\Models\TargetCategory;
use Illuminate\Support\Collection;

class TargetCategoryDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): TargetCategoryData
    {
        return parent::current();
    }

    /**
     * @param  TargetCategory[]  $data
     * @return TargetCategoryDataCollection
     */
    public static function fromArray(array $data): TargetCategoryDataCollection
    {
        return new self(
            array_map(fn(TargetCategory $item) => TargetCategoryData::fromModel($item), $data)
        );
    }

    /**
     * @param  TargetCategory[]  $data
     * @return TargetCategoryDataCollection
     */
    public static function fromCollection(Collection $data): TargetCategoryDataCollection
    {
        $newData = $data->map(fn(TargetCategory $item) => TargetCategoryData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
