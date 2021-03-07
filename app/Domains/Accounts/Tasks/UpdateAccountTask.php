<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Repositories\AccountRepository;
use Domains\Accounts\Repositories\AccountsExtraRepository;
use Illuminate\Support\Facades\DB;

class UpdateAccountTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountRepository $accountRepository,
        protected AccountsExtraRepository $accountsExtraRepository
    )
    {}

    public function run(int $id, AccountData $dto, AccountExtraData $extraData): Account
    {
        $accountData = DB::transaction(function() use ($dto, $extraData, $id): Account {
            $account = $this->accountRepository->update($dto->toArray(), $id);
            $extra = $this->accountsExtraRepository->find($id);
            $extraData->id = $account->id;
            if (!$extra) {
                $extra = $this->accountsExtraRepository->create($extraData->toArray());
            } else {
                $extra = $this->accountsExtraRepository->update($extraData->toArray(), $id);
            }
            $account->extra = $extra;
            return $account;
        });
        return $accountData;
    }
}
