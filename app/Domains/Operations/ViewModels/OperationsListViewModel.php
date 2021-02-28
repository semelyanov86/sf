<?php


namespace Domains\Operations\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountDataCollection;
use Domains\Accounts\Models\Account;
use Domains\Categories\DataTransferObjects\CategoryDataCollection;
use Domains\Categories\Models\Category;
use Domains\Operations\DataTransferObjects\OperationDataCollection;
use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Users\DataTransferObjects\UserDataCollection;
use Domains\Users\Models\User;

class OperationsListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?OperationDataCollection $operationDataCollection = null,
        protected ?AccountDataCollection $accountDataCollection = null,
        protected ?CategoryDataCollection $categoryDataCollection = null,
        protected ?UserDataCollection $userDataCollection = null,
        protected ?TeamDataCollection $teamDataCollection = null
    )
    {}

    public function operations(): OperationDataCollection
    {
        return $this->operationDataCollection ?? OperationDataCollection::fromCollection(collect([]));
    }

    public function accounts(): AccountDataCollection
    {
        return $this->accountDataCollection ?? AccountDataCollection::fromCollection(Account::get());
    }

    public function categories(): CategoryDataCollection
    {
        return $this->categoryDataCollection ?? CategoryDataCollection::fromCollection(Category::get());
    }

    public function users(): UserDataCollection
    {
        return $this->userDataCollection ?? UserDataCollection::fromCollection(User::get());
    }

    public function teams(): TeamDataCollection
    {
        return $this->teamDataCollection ?? TeamDataCollection::fromCollection(Team::get());
    }
}
