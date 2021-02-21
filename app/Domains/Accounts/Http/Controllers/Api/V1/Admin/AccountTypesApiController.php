<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Domains\Accounts\Actions\IndexAccountTypesAction;
use Domains\Accounts\Actions\ShowAccountTypeAction;
use Domains\Accounts\Http\Requests\DeleteAccountTypeRequest;
use Domains\Accounts\Http\Requests\IndexAccountTypesRequest;
use Domains\Accounts\Http\Requests\ShowAccountTypeRequest;
use Domains\Accounts\Transformers\AccountTypeDataTransformer;
use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountTypeRequest;
use Domains\Accounts\Http\Requests\UpdateAccountTypeRequest;
use Domains\Accounts\Models\AccountType;

class AccountTypesApiController extends Controller
{
    public function index(IndexAccountTypesRequest $request, IndexAccountTypesAction $action): \Illuminate\Http\JsonResponse
    {
        $types = $action()->accountTypes();
        return fractal($types, AccountTypeDataTransformer::class)->respond();
    }

    public function store(StoreAccountTypeRequest $request): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function show(ShowAccountTypeRequest $request, AccountType $accountType, ShowAccountTypeAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action($accountType)->accountType(), AccountTypeDataTransformer::class)->respond();
    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType): void
    {
        abort(501, 'Current method is not implemented');
    }

    public function destroy(DeleteAccountTypeRequest $request, AccountType $accountType): void
    {
        abort(501, 'Current method is not implemented');
    }
}
