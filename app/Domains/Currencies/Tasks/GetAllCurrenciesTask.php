<?php


namespace Domains\Currencies\Tasks;


use Domains\Currencies\Repositories\CurrencyRepository;

final class GetAllCurrenciesTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected CurrencyRepository $currencyRepository
    )
    {}

    public function run(): \Illuminate\Support\Collection
    {
        return $this->currencyRepository->all();
    }
}
