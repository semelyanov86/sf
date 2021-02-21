<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Domains\Accounts\Actions\ShowAccountAction;
use Domains\Accounts\Http\Requests\ShowAccountRequest;
use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountsExtraRequest;
use Domains\Accounts\Http\Requests\UpdateAccountsExtraRequest;
use Domains\Accounts\Http\Resources\AccountsExtraResource;
use Domains\Accounts\Models\AccountsExtra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsExtraApiController extends Controller
{
    public function index(): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function store(StoreAccountsExtraRequest $request): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function show(ShowAccountRequest $request, AccountsExtra $accountsExtra, ShowAccountAction $action): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function update(UpdateAccountsExtraRequest $request, AccountsExtra $accountsExtra): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function destroy(AccountsExtra $accountsExtra): void
    {
        abort(501, 'Current method is not implemented');
    }
}
