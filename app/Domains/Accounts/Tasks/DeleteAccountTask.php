<?php
declare(strict_types=1);

namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\Repositories\AccountRepository;
use Domains\Accounts\Repositories\AccountsExtraRepository;

final class DeleteAccountTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountRepository $accountRepository,
        protected AccountsExtraRepository $accountsExtraRepository
    )
    {}

    public function run(int $id): void
    {
        $this->accountRepository->delete($id);
        $this->accountsExtraRepository->delete($id);
    }
}
