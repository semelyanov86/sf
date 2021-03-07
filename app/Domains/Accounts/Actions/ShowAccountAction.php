<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;

use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\ViewModels\AccountViewModel;
use Parents\Foundation\Facades\SF;

class ShowAccountAction extends \Parents\Actions\Action
{
    public function __invoke(int $id): AccountViewModel
    {
        $accountData = SF::call('Accounts@FindAccountTask', [$id]);
        if (!$accountData->extra) {
            $accountExtra = new AccountsExtra();
            $accountExtra->id = $accountData->id;
            $accountData->extra = $accountExtra;
        }
        return new AccountViewModel($accountData);
    }
}
