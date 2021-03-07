<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\Repositories\AccountTypeRepository;
use Illuminate\Support\Collection;

class GetAllAccountTypesTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountTypeRepository $accountTypeRepository
    )
    {}

    public function run(): Collection
    {
        return $this->accountTypeRepository->all();
    }
}
