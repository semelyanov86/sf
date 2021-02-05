<?php

namespace Domains\Banks\Http\Controllers\Api;

use Domains\Banks\Actions\GetAllBanksAction;
use Domains\Banks\Actions\StoreBankAction;
use Domains\Banks\Actions\UpdateBankAction;
use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Http\Requests\DeleteBankRequest;
use Domains\Banks\Http\Requests\IndexBankRequest;
use Domains\Banks\Http\Requests\ShowBankRequest;
use Domains\Banks\Transformers\BankTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Parents\Controllers\ApiController as Controller;
use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Models\Bank;
use Symfony\Component\HttpFoundation\Response;

class BanksApiController extends Controller
{
    public function index(IndexBankRequest $request, GetAllBanksAction $action): \Illuminate\Http\JsonResponse
    {
        $actionResult = $action();
        return fractal($actionResult->banks(), new BankTransformer())
            ->respond();
    }

    public function store(StoreBankRequest $request, StoreBankAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(BankData::fromRequest($request));
        return fractal($viewModel->bank(), new BankTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowBankRequest $request, Bank $bank): \Illuminate\Http\JsonResponse
    {
        return fractal(BankData::fromModel($bank->load(['country'])), new BankTransformer())->parseIncludes(['country'])->respond();
    }

    public function update(UpdateBankRequest $request, Bank $bank, UpdateBankAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($bank, BankData::fromRequest($request));
        return fractal($viewModel->bank(), new BankTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteBankRequest $request, Bank $bank): \Illuminate\Http\Response
    {
        $bank->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
