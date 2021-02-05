<?php


namespace Domains\Banks\Actions;


use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Models\Bank;
use Domains\Banks\ViewModels\BankViewModel;

class UpdateBankAction extends \Parents\Actions\Action
{
    public function __invoke(Bank $bank, BankData $dto): BankViewModel
    {
        $bank->update($dto->toArray());
        return new BankViewModel(BankData::fromModel($bank));
    }
}
