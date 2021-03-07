<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\Repositories\AccountRepository;
use Domains\Accounts\Repositories\AccountsExtraRepository;
use Domains\Accounts\ViewModels\AccountViewModel;
use Illuminate\Support\Facades\DB;

class StoreAccountTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountRepository $accountRepository,
        protected AccountsExtraRepository $accountsExtraRepository
    )
    {}

    public function run(AccountData $dto, AccountExtraData $extra): Account
    {
        $accountData = DB::transaction(function() use ($dto, $extra): Account {
            $account = $this->accountRepository->create($dto->toArray());
            $extra->id = $account->id;
            $accountExtra = $this->accountsExtraRepository->create($extra->toArray());
            $account->extra = $accountExtra;
            return $account;
        });

        return $accountData;
    }
}
