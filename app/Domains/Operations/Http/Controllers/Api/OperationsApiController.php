<?php

namespace Domains\Operations\Http\Controllers\Api;

use Domains\Operations\Actions\EditOperationAction;
use Domains\Operations\Actions\IndexOperationsAction;
use Domains\Operations\Actions\StoreOperationAction;
use Domains\Operations\Actions\UpdateOperationAction;
use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Http\Requests\DeleteOperationRequest;
use Domains\Operations\Http\Requests\IndexOperationsRequest;
use Domains\Operations\Http\Requests\ShowOperationRequest;
use Domains\Operations\Transformers\OperationTransformer;
use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Operations\Http\Requests\StoreOperationRequest;
use Domains\Operations\Http\Requests\UpdateOperationRequest;
use Domains\Operations\Models\Operation;
use Symfony\Component\HttpFoundation\Response;

class OperationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexOperationsRequest $request, IndexOperationsAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action(), new OperationTransformer())->respond();
    }

    public function store(StoreOperationRequest $request, StoreOperationAction $action): \Illuminate\Http\JsonResponse
    {
        $data = $action(OperationData::fromRequest($request));
        return fractal($data, new OperationTransformer())->parseIncludes(['source_account', 'category'])->respond(Response::HTTP_CREATED);
    }

    public function show(ShowOperationRequest $request, Operation $operation, EditOperationAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($operation);
        return fractal($viewModel->operation(), new OperationTransformer())->parseIncludes(['source_account', 'category'])->respond();
    }

    public function update(UpdateOperationRequest $request, Operation $operation, UpdateOperationAction $action): \Illuminate\Http\JsonResponse
    {
        $data = $action($operation, OperationData::fromRequest($request));
        return fractal($data, new OperationTransformer())->parseIncludes(['source_account', 'category'])->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteOperationRequest $request, Operation $operation): \Illuminate\Http\Response
    {
        $operation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
