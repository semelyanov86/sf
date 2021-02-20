<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\ViewModels\AccountViewModel;
use Illuminate\Support\Facades\DB;

class StoreAccountTask extends \Parents\Tasks\Task
{
    public function run(AccountData $dto, AccountExtraData $extra): AccountViewModel
    {
        $accountData = DB::transaction(function() use ($dto, $extra) {
            $account = Account::create($dto->toArray());
            $extra->id = $account->id;
            $accountExtra = AccountsExtra::create($extra->toArray());
            $accountData = AccountData::fromModel($account);
            $accountData->extra = AccountExtraData::fromModel($accountExtra);
            return $accountData;
        });

        return new AccountViewModel($accountData);
    }
}
