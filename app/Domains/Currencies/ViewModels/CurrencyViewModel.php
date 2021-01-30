<?php


namespace Domains\Currencies\ViewModels;


use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Models\Currency;

class CurrencyViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CurrencyData $currency
    )
    {}

    public function currency(): CurrencyData
    {
        return $this->currency ?? CurrencyData::fromModel(new Currency());
    }
}
