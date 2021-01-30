<?php


namespace Domains\Currencies\Actions;


use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Models\Currency;
use Domains\Currencies\ViewModels\CurrencyViewModel;

class UpdateCurrencyAction extends \Parents\Actions\Action
{
    public function __invoke(Currency $currency, CurrencyData $dto, array $users = []): CurrencyViewModel
    {
        $currency->update($dto->toArray());
        $currency->users()->sync($users);
        return new CurrencyViewModel(CurrencyData::fromModel($currency));
    }
}
