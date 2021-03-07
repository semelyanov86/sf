<?php
declare(strict_types=1);

namespace Domains\Accounts\Tasks;


use Domains\Accounts\Models\AccountType;
use Domains\Accounts\Repositories\AccountTypeRepository;

final class FindAccountTypeTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountTypeRepository $accountTypeRepository
    )
    {}

    public function run(int $id): AccountType
    {
        return $this->accountTypeRepository->find($id);
    }
}
