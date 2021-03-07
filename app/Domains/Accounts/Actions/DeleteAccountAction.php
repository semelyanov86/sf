<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;

use Parents\Foundation\Facades\SF;

final class DeleteAccountAction extends \Parents\Actions\Action
{
    public function __invoke(int $account): void
    {
        SF::call('Accounts@DeleteAccountTask', [$account]);
    }
}
