<?php


namespace Domains\Banks\Actions;


use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Models\Bank;
use Domains\Banks\ViewModels\BankViewModel;

class StoreBankAction extends \Parents\Actions\Action
{
    public function __invoke(BankData $dto): BankViewModel
    {
        return new BankViewModel(BankData::fromModel(Bank::create($dto->toArray())));
    }
}
