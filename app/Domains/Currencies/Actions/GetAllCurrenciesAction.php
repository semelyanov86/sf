<?php


namespace Domains\Currencies\Actions;


use Domains\Currencies\DataTransferObjects\CurrencyDataCollection;
use Domains\Currencies\Models\Currency;
use Domains\Currencies\ViewModels\CurrencyListViewModel;

class GetAllCurrenciesAction extends \Parents\Actions\Action
{
    public function __invoke(): CurrencyListViewModel
    {
        $currencies = CurrencyDataCollection::fromCollection(Currency::with(['users'])->get());
        return new CurrencyListViewModel($currencies);
    }
}
