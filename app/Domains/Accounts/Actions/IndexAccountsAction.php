<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;

use Domains\Accounts\DataTransferObjects\AccountDataCollection;
use Illuminate\Support\Collection;
use Parents\Foundation\Facades\SF;

final class IndexAccountsAction extends \Parents\Actions\Action
{
    public function __invoke(): Collection
    {
        return SF::call('Accounts@GetAllAccountsTask');
    }
}
