<?php


namespace Domains\AutoBrands\DataTransferObjects;


use Domains\AutoBrands\Models\AutoBrand;
use Illuminate\Support\Collection;

final class AutoBrandDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): AutoBrandData
    {
        return parent::current();
    }

    /**
     * @param  AutoBrand[]  $data
     * @return AutoBrandDataCollection
     */
    public static function fromArray(array $data): AutoBrandDataCollection
    {
        return new self(
            array_map(fn(AutoBrand $item) => AutoBrandData::fromModel($item), $data)
        );
    }

    /**
     * @param  AutoBrand[]  $data
     * @return AutoBrandDataCollection
     */
    public static function fromCollection(Collection $data): AutoBrandDataCollection
    {
        $newData = $data->map(fn(AutoBrand $item) => AutoBrandData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
