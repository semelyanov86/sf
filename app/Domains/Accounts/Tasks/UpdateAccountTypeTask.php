<?php


namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;
use Domains\Accounts\Repositories\AccountTypeRepository;

class UpdateAccountTypeTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountTypeRepository $accountTypeRepository
    )
    {}

    public function run(AccountTypeData $dto, int $id): AccountType
    {
        return $this->accountTypeRepository->update($dto->toArray(), $id);
    }
}
