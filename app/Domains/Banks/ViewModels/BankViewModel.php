<?php


namespace Domains\Banks\ViewModels;


use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Models\Bank;

class BankViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?BankData $bankData
    )
    {}

    public function bank(): BankData
    {
        return $this->bankData ?? BankData::fromModel(new Bank());
    }
}
