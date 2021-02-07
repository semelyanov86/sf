<?php


namespace Domains\Categories\DataTransferObjects;


use Domains\Categories\Models\HiddenCategory;
use Illuminate\Support\Collection;

class HiddenCategoryDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): HiddenCategoryData
    {
        return parent::current();
    }

    /**
     * @param  HiddenCategory[]  $data
     * @return HiddenCategoryDataCollection
     */
    public static function fromArray(array $data): HiddenCategoryDataCollection
    {
        return new self(
            array_map(fn(HiddenCategory $item) => HiddenCategoryData::fromModel($item), $data)
        );
    }

    /**
     * @param  Collection  $data
     * @return HiddenCategoryDataCollection
     */
    public static function fromCollection(Collection $data): HiddenCategoryDataCollection
    {
        $newData = $data->map(fn(HiddenCategory $item) => HiddenCategoryData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
