<?php


namespace Domains\Banks\Actions;


use Domains\Banks\DataTransferObjects\BankDataCollection;
use Domains\Banks\Models\Bank;
use Domains\Banks\ViewModels\BankListViewModel;

class GetAllBanksAction extends \Parents\Actions\Action
{
    public function __invoke(): BankListViewModel
    {
        $banks = Bank::with(['country'])->get();
        return new BankListViewModel(BankDataCollection::fromCollection($banks));
    }
}
