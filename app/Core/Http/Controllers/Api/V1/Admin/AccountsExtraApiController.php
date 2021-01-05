<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\StoreAccountsExtraRequest;
use App\Http\Controllers\Requests\UpdateAccountsExtraRequest;
use App\Http\Controllers\Resources\Admin\AccountsExtraResource;
use App\Models\AccountsExtra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsExtraApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('accounts_extra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountsExtraResource(AccountsExtra::with(['card_type', 'auto_brand', 'team'])->get());
    }

    public function store(StoreAccountsExtraRequest $request)
    {
        $accountsExtra = AccountsExtra::create($request->all());

        return (new AccountsExtraResource($accountsExtra))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountsExtra $accountsExtra)
    {
        abort_if(Gate::denies('accounts_extra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountsExtraResource($accountsExtra->load(['card_type', 'auto_brand', 'team']));
    }

    public function update(UpdateAccountsExtraRequest $request, AccountsExtra $accountsExtra)
    {
        $accountsExtra->update($request->all());

        return (new AccountsExtraResource($accountsExtra))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountsExtra $accountsExtra)
    {
        abort_if(Gate::denies('accounts_extra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtra->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
