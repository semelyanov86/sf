<?php


namespace Domains\Countries\DataTransferObjects;


use Domains\Countries\Models\Country;
use Illuminate\Support\Collection;

class CountryDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): CountryData
    {
        return parent::current();
    }

    /**
     * @param  Country[]  $data
     * @return CountryDataCollection
     */
    public static function fromArray(array $data): CountryDataCollection
    {
        return new self(
            array_map(fn(Country $item) => CountryData::fromModel($item), $data)
        );
    }

    /**
     * @param  Country[]  $data
     * @return CountryDataCollection
     */
    public static function fromCollection(Collection $data): CountryDataCollection
    {
        $newData = $data->map(fn(Country $item) => CountryData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
