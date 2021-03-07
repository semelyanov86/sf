<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;
use Parents\Foundation\Facades\SF;

class UpdateAccountTypeAction extends \Parents\Actions\Action
{
    public function __invoke(AccountTypeData $dto, int $id): AccountType
    {
        return SF::call('Accounts@UpdateAccountTypeTask', [$dto, $id]);
    }
}
