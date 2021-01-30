<?php


namespace Domains\Currencies\Actions;


use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Models\Currency;
use Domains\Currencies\ViewModels\CurrencyViewModel;

class ShowCurrencyAction extends \Parents\Actions\Action
{
    public function __invoke(Currency $currency): CurrencyViewModel
    {
        $currency->load('users');
        return new CurrencyViewModel(CurrencyData::fromModel($currency));
    }
}
