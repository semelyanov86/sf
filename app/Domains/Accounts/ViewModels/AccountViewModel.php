<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\Models\Account;
use Illuminate\Support\Collection;

class AccountViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?Account $accountData = null,
        protected ?Collection $accountTypes = null,
        protected ?Collection $currencies = null,
        protected ?Collection $banks = null
    )
    {}

    public function account(): Account
    {
        return $this->accountData ?? new Account();
    }

    public function accountTypes(): Collection
    {
        return $this->accountTypes ?? collect([]);
    }

    public function currencies(): Collection
    {
        return $this->currencies ?? collect([]);
    }

    public function banks(): Collection
    {
        return $this->banks ?? collect([]);
    }
}
