<?php
declare(strict_types=1);

namespace Domains\Accounts\Tasks;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;
use Domains\Accounts\Repositories\AccountTypeRepository;

final class StoreAccountTypeTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected AccountTypeRepository $accountTypeRepository
    )
    {}

    public function run(AccountTypeData $dto): AccountType
    {
        return $this->accountTypeRepository->create($dto->toArray());
    }
}
