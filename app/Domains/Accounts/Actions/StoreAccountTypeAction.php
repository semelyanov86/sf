<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;
use Parents\Foundation\Facades\SF;

final class StoreAccountTypeAction extends \Parents\Actions\Action
{
    public function __invoke(AccountTypeData $accountTypeData): AccountType
    {
        return SF::call('Accounts@StoreAccountTypeTask', [$accountTypeData]);
    }
}
