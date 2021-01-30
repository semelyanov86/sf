<?php


namespace Domains\Currencies\ViewModels;


use Domains\Currencies\DataTransferObjects\CurrencyDataCollection;
use Domains\Currencies\Models\Currency;

class CurrencyListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CurrencyDataCollection $currencies
    )
    {}

    public function currencies(): CurrencyDataCollection
    {
        return $this->currencies ?? CurrencyDataCollection::fromCollection(Currency::all());
    }
}
