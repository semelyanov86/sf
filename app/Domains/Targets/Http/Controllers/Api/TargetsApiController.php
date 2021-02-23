<?php

namespace Domains\Targets\Http\Controllers\Api;

use Composer\Util\Tar;
use Domains\Targets\Actions\GetAllTargetsAction;
use Domains\Targets\Actions\ShowTargetAction;
use Domains\Targets\Actions\StoreTargetAction;
use Domains\Targets\Actions\UpdateTargetAction;
use Domains\Targets\DataTransferObjects\TargetData;
use Domains\Targets\Http\Requests\DeleteTargetRequest;
use Domains\Targets\Http\Requests\IndexTargetsRequest;
use Domains\Targets\Http\Requests\ShowTargetRequest;
use Domains\Targets\Transformers\TargetTransformer;
use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\StoreTargetRequest;
use Domains\Targets\Http\Requests\UpdateTargetRequest;
use Domains\Targets\Http\Resources\TargetResource;
use Domains\Targets\Models\Target;
use Symfony\Component\HttpFoundation\Response;

final class TargetsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexTargetsRequest $request, GetAllTargetsAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->targets(), new TargetTransformer())->respond();
    }

    public function store(StoreTargetRequest $request, StoreTargetAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(TargetData::fromRequest($request));

        return fractal($viewModel->targetData(), new TargetTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowTargetRequest $request, Target $target, ShowTargetAction $action): \Illuminate\Http\JsonResponse
    {
        $targetData = TargetData::fromModel($target->load(['target_category', 'currency', 'account_from', 'user', 'team']));
        return fractal($action($targetData)->targetData(), new TargetTransformer())->parseIncludes(['currency', 'target_category', 'account_from'])->respond();
    }

    public function update(UpdateTargetRequest $request, Target $target, UpdateTargetAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(TargetData::fromRequest($request), $target);
        return fractal($viewModel->targetData(), new TargetTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteTargetRequest $request, Target $target): \Illuminate\Http\Response
    {
        $target->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
