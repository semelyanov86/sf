<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountDataCollection;
use Domains\Accounts\Repositories\AccountRepository;
use Illuminate\Support\Collection;

class GetAllAccountsTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountRepository $repository
    )
    {}

    public function run(): Collection
    {
        return $this->repository->with(['account_type', 'currency', 'bank', 'team'])->all();
    }
}
