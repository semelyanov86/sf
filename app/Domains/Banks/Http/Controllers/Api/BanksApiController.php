<?php

namespace Domains\Banks\Http\Controllers\Api;

use Parents\Controllers\Controller;
use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Http\Resources\BankResource;
use Domains\Banks\Models\Bank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankResource(Bank::with(['country'])->get());
    }

    public function store(StoreBankRequest $request)
    {
        $bank = Bank::create($request->all());

        return (new BankResource($bank))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bank $bank)
    {
        abort_if(Gate::denies('bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankResource($bank->load(['country']));
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->all());

        return (new BankResource($bank))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bank $bank)
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
