<?php
declare(strict_types=1);

namespace Domains\Accounts\Tasks;


use Domains\Accounts\Models\Account;
use Domains\Accounts\Repositories\AccountRepository;

final class FindAccountTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountRepository $repository
    )
    {}

    public function run(int $id): Account
    {
        return $this->repository->with(['account_type', 'currency', 'bank', 'team', 'extra'])->find($id);
    }
}
