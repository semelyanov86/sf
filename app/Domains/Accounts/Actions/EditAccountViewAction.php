<?php
declare(strict_types=1);

namespace Domains\Accounts\Actions;


use Domains\Accounts\Models\Account;
use Domains\Accounts\ViewModels\AccountViewModel;
use Illuminate\Support\Collection;
use Parents\Foundation\Facades\SF;

final class EditAccountViewAction extends \Parents\Actions\Action
{
    public function __invoke(?int $id = null): AccountViewModel
    {
        return new AccountViewModel(
            $id ? SF::call('Accounts@FindAccountTask', [$id]) : new Account(),
            $this->pluckCollection(SF::call('Accounts@GetAllAccountTypesTask'), 'name', 'id'),
            $this->pluckCollection(SF::call('Currencies@GetAllCurrenciesTask'), 'code', 'id'),
            $this->pluckCollection(SF::call('Banks@GetAllBanksTask'), 'name', 'id')
        );
    }

    protected function pluckCollection(Collection $data, string $name, string $id): Collection
    {
        return $data->pluck($name, $id)->prepend(trans('global.pleaseSelect'), '');
    }
}
