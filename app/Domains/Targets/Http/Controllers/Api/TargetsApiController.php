<?php

namespace Domains\Targets\Http\Controllers\Api;

use Domains\Targets\Http\Requests\DeleteTargetRequest;
use Domains\Targets\Http\Requests\IndexTargetsRequest;
use Domains\Targets\Http\Requests\ShowTargetRequest;
use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\StoreTargetRequest;
use Domains\Targets\Http\Requests\UpdateTargetRequest;
use Domains\Targets\Http\Resources\TargetResource;
use Domains\Targets\Models\Target;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TargetsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexTargetsRequest $request): TargetResource
    {
        return new TargetResource(Target::with(['target_category', 'currency', 'account_from', 'user', 'team'])->get());
    }

    public function store(StoreTargetRequest $request): \Illuminate\Http\JsonResponse
    {
        $target = Target::create($request->all());

        if ($request->input('image', false)) {
            $target->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new TargetResource($target))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ShowTargetRequest $request, Target $target): TargetResource
    {
        return new TargetResource($target->load(['target_category', 'currency', 'account_from', 'user', 'team']));
    }

    public function update(UpdateTargetRequest $request, Target $target): \Illuminate\Http\JsonResponse
    {
        $target->update($request->all());

        if ($request->input('image', false)) {
            if (!$target->image || $request->input('image') !== $target->image->file_name) {
                if ($target->image) {
                    $target->image->delete();
                }

                $target->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($target->image) {
            $target->image->delete();
        }

        return (new TargetResource($target))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteTargetRequest $request, Target $target): \Illuminate\Http\Response
    {
        $target->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
