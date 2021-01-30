<?php


namespace Domains\Currencies\Actions;


use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Models\Currency;
use Domains\Currencies\ViewModels\CurrencyViewModel;

class StoreCurrencyAction extends \Parents\Actions\Action
{
    public function __invoke(CurrencyData $dto, array $users = []): CurrencyViewModel
    {
        $currency = Currency::create($dto->toArray());
        $currency->users()->sync($users);
        return new CurrencyViewModel(CurrencyData::fromModel($currency));
    }
}
