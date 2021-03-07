<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountTypeDataCollection;
use Domains\Accounts\Models\AccountType;
use Domains\Accounts\ViewModels\AccountTypeListViewModel;
use Parents\Foundation\Facades\SF;

final class IndexAccountTypesAction extends \Parents\Actions\Action
{
    public function __invoke(): AccountTypeListViewModel
    {
        $accounts = SF::call('Accounts@GetAllAccountTypesTask');
        return new AccountTypeListViewModel($accounts);
    }
}
