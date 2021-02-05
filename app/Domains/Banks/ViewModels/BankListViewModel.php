<?php


namespace Domains\Banks\ViewModels;


use Domains\Banks\DataTransferObjects\BankDataCollection;
use Domains\Banks\Models\Bank;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BankListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?BankDataCollection $bankDataCollection
    )
    {}

    public function banks(): BankDataCollection
    {
        return $this->bankDataCollection ?? BankDataCollection::fromCollection(Bank::all());
    }

    public function paginator(): LengthAwarePaginator
    {
        return $this->paginator ?? new \Illuminate\Pagination\LengthAwarePaginator([], 0, 50);
    }
}
