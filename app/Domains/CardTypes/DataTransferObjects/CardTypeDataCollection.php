<?php


namespace Domains\CardTypes\DataTransferObjects;


use Domains\CardTypes\Models\CardType;
use Domains\Countries\DataTransferObjects\CountryDataCollection;
use Illuminate\Support\Collection;

class CardTypeDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): CardTypeData
    {
        return parent::current();
    }

    /**
     * @param  CardType[]  $data
     * @return CardTypeDataCollection
     */
    public static function fromArray(array $data): CardTypeDataCollection
    {
        return new self(
            array_map(fn(CardType $item) => CardTypeData::fromModel($item), $data)
        );
    }

    /**
     * @param  CardType[]  $data
     * @return CardTypeDataCollection
     */
    public static function fromCollection(Collection $data): CardTypeDataCollection
    {
        $newData = $data->map(fn(CardType $item) => CardTypeData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }

}
