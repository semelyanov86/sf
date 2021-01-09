<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Http\Resources\AccountResource;
use Domains\Accounts\Models\Account;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsApiController extends Controller
{
    public function index(): AccountResource
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource(Account::with(['account_type', 'currency', 'bank', 'team'])->get());
    }

    public function store(StoreAccountRequest $request): \Illuminate\Http\JsonResponse
    {
        $account = Account::create($request->all());

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Account $account): AccountResource
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource($account->load(['account_type', 'currency', 'bank', 'team']));
    }

    public function update(UpdateAccountRequest $request, Account $account): \Illuminate\Http\JsonResponse
    {
        $account->update($request->all());

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Account $account): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
