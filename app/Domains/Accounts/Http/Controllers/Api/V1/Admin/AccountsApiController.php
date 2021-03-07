<?php

namespace Domains\Accounts\Http\Controllers\Api\V1\Admin;

use Domains\Accounts\Actions\DeleteAccountAction;
use Domains\Accounts\Actions\IndexAccountsAction;
use Domains\Accounts\Actions\ShowAccountAction;
use Domains\Accounts\Actions\StoreAccountAction;
use Domains\Accounts\Actions\UpdateAccountAction;
use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Http\Requests\DeleteAccountRequest;
use Domains\Accounts\Http\Requests\IndexAccountRequest;
use Domains\Accounts\Http\Requests\ShowAccountRequest;
use Domains\Accounts\Transformers\AccountDataTransformer;
use Parents\Controllers\ApiController as Controller;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Models\Account;
use Symfony\Component\HttpFoundation\Response;

class AccountsApiController extends Controller
{
    public function index(IndexAccountRequest $request, IndexAccountsAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action(), new AccountDataTransformer())->respond();
    }

    public function store(StoreAccountRequest $request, StoreAccountAction $action): \Illuminate\Http\JsonResponse
    {
        $account = $action(AccountData::fromRequest($request), AccountExtraData::fromRequest($request));
        return fractal($account, new AccountDataTransformer())
            ->parseIncludes(['extra', 'account_type', 'currency', 'bank'])
            ->respond(Response::HTTP_CREATED);
    }

    public function show(ShowAccountRequest $request, int $id, ShowAccountAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($id);
        return fractal($viewModel->account(), new AccountDataTransformer())
            ->parseIncludes(['account_type', 'bank', 'currency', 'extra'])
            ->respond();
    }

    public function update(UpdateAccountRequest $request, int $account, UpdateAccountAction $action): \Illuminate\Http\JsonResponse
    {
        $account = $action($account, AccountData::fromRequest($request), AccountExtraData::fromRequest($request));
        return fractal($account, new AccountDataTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteAccountRequest $request, int $account, DeleteAccountAction $action): \Illuminate\Http\Response
    {
        $action($account);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
