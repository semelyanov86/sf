<?php

namespace Domains\Operations\Http\Controllers\Api;

use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Operations\Http\Requests\StoreOperationRequest;
use Domains\Operations\Http\Requests\UpdateOperationRequest;
use Domains\Operations\Http\Resources\OperationResource;
use Domains\Operations\Models\Operation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(): OperationResource
    {
        abort_if(Gate::denies('operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OperationResource(Operation::with(['source_account', 'to_account', 'category', 'user', 'team'])->get());
    }

    public function store(StoreOperationRequest $request): \Illuminate\Http\JsonResponse
    {
        $operation = Operation::create($request->all());

        if ($request->input('attachment', false)) {
            $operation->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        return (new OperationResource($operation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Operation $operation): OperationResource
    {
        abort_if(Gate::denies('operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OperationResource($operation->load(['source_account', 'to_account', 'category', 'user', 'team']));
    }

    public function update(UpdateOperationRequest $request, Operation $operation): \Illuminate\Http\JsonResponse
    {
        $operation->update($request->all());

        if ($request->input('attachment', false)) {
            if (!$operation->attachment || $request->input('attachment') !== $operation->attachment->file_name) {
                if ($operation->attachment) {
                    $operation->attachment->delete();
                }

                $operation->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
            }
        } elseif ($operation->attachment) {
            $operation->attachment->delete();
        }

        return (new OperationResource($operation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Operation $operation): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
