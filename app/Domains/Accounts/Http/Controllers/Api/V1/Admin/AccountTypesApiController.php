<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Domains\Accounts\Http\Requests\DeleteAccountTypeRequest;
use Domains\Accounts\Http\Requests\IndexAccountTypesRequest;
use Domains\Accounts\Http\Requests\ShowAccountTypeRequest;
use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountTypeRequest;
use Domains\Accounts\Http\Requests\UpdateAccountTypeRequest;
use Domains\Accounts\Http\Resources\AccountTypeResource;
use Domains\Accounts\Models\AccountType;
use Symfony\Component\HttpFoundation\Response;

class AccountTypesApiController extends Controller
{
    public function index(IndexAccountTypesRequest $request): AccountTypeResource
    {
        return new AccountTypeResource(AccountType::all());
    }

    public function store(StoreAccountTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        $accountType = AccountType::create($request->all());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ShowAccountTypeRequest $request, AccountType $accountType): AccountTypeResource
    {
        return new AccountTypeResource($accountType);
    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType): \Illuminate\Http\JsonResponse
    {
        $accountType->update($request->all());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteAccountTypeRequest $request, AccountType $accountType): \Illuminate\Http\Response
    {
        $accountType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
