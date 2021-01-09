<?php

namespace Domains\Banks\Http\Controllers\Api;

use Parents\Controllers\ApiController as Controller;
use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Http\Resources\BankResource;
use Domains\Banks\Models\Bank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanksApiController extends Controller
{
    public function index(): BankResource
    {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankResource(Bank::with(['country'])->get());
    }

    public function store(StoreBankRequest $request): \Illuminate\Http\JsonResponse
    {
        $bank = Bank::create($request->all());

        return (new BankResource($bank))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bank $bank): BankResource
    {
        abort_if(Gate::denies('bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankResource($bank->load(['country']));
    }

    public function update(UpdateBankRequest $request, Bank $bank): \Illuminate\Http\JsonResponse
    {
        $bank->update($request->all());

        return (new BankResource($bank))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bank $bank): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
