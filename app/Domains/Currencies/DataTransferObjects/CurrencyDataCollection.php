<?php


namespace Domains\Currencies\DataTransferObjects;


use Domains\Currencies\Models\Currency;
use Illuminate\Support\Collection;

final class CurrencyDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): CurrencyData
    {
        return parent::current();
    }

    /**
     * @param  Currency[]  $data
     * @return CurrencyDataCollection
     */
    public static function fromArray(array $data): CurrencyDataCollection
    {
        return new self(
            array_map(fn(Currency $item) => CurrencyData::fromModel($item), $data)
        );
    }

    /**
     * @param  Currency[]  $data
     * @return CurrencyDataCollection
     */
    public static function fromCollection(Collection $data): CurrencyDataCollection
    {
        $newData = $data->map(fn(Currency $item) => CurrencyData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }

    public function toCollection(): Collection
    {
        return collect($this->items());
    }
}
