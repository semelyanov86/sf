<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountTypeRequest;
use Domains\Accounts\Http\Requests\UpdateAccountTypeRequest;
use Domains\Accounts\Http\Resources\AccountTypeResource;
use Domains\Accounts\Models\AccountType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountTypeResource(AccountType::all());
    }

    public function store(StoreAccountTypeRequest $request)
    {
        $accountType = AccountType::create($request->all());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountTypeResource($accountType);
    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType)
    {
        $accountType->update($request->all());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
