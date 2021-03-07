<?php


namespace Domains\Banks\Tasks;


use Domains\Banks\Repositories\BankRepository;
use Illuminate\Support\Collection;

final class GetAllBanksTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected BankRepository $bankRepository
    )
    {}

    public function run(): Collection
    {
        return $this->bankRepository->all();
    }
}
