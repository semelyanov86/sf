<?php


namespace Domains\Categories\DataTransferObjects;


use Domains\Categories\Models\Category;
use Illuminate\Support\Collection;

class CategoryDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): CategoryData
    {
        return parent::current();
    }

    /**
     * @param  Category[]  $data
     * @return CategoryDataCollection
     */
    public static function fromArray(array $data): CategoryDataCollection
    {
        return new self(
            array_map(fn(Category $item) => CategoryData::fromModel($item), $data)
        );
    }

    /**
     * @param  Collection  $data
     * @return CategoryDataCollection
     */
    public static function fromCollection(Collection $data): CategoryDataCollection
    {
        $newData = $data->map(fn(Category $item) => CategoryData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
