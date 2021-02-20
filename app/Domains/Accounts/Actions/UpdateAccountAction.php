<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\ViewModels\AccountViewModel;

class UpdateAccountAction extends \Parents\Actions\Action
{
    public function __invoke(Account $account, AccountData $dto): AccountViewModel
    {
        $account->update($dto->toArray());
        $dto->id = $account->id;
        $extra = AccountsExtra::find($dto->id);
        if (!$extra) {
            $extra = AccountsExtra::create($dto->toArray());
        }
        $extra->update($dto->toArray());
        $dto->extra = AccountExtraData::fromModel($extra);
        return new AccountViewModel($dto);
    }
}
