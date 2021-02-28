<?php


namespace Domains\Operations\ViewModels;


use Domains\Accounts\Models\Account;
use Domains\Categories\Models\Category;
use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Users\Models\User;
use Illuminate\Support\Collection;

class OperationViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?OperationData $operationData = null,
        protected ?Collection $accountDataCollection = null,
        protected ?Collection $categoryDataCollection = null,
        protected ?Collection $userDataCollection = null
    )
    {}

    public function operation(): ?OperationData
    {
        return $this->operationData;
    }

    public function accounts(): Collection
    {
        if ($this->accountDataCollection) {
            return $this->accountDataCollection;
        }
        return Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    }

    public function categories(): Collection
    {
        if ($this->categoryDataCollection) {
            return $this->categoryDataCollection;
        }
        return Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    }

    public function users(): Collection
    {
        if ($this->userDataCollection) {
            return $this->userDataCollection;
        }
        return User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    }
}
