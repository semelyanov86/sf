<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTargetRequest;
use App\Http\Requests\UpdateTargetRequest;
use App\Http\Resources\Admin\TargetResource;
use App\Models\Target;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TargetsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('target_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TargetResource(Target::with(['target_category', 'currency', 'account_from', 'user', 'team'])->get());
    }

    public function store(StoreTargetRequest $request)
    {
        $target = Target::create($request->all());

        if ($request->input('image', false)) {
            $target->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new TargetResource($target))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Target $target)
    {
        abort_if(Gate::denies('target_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TargetResource($target->load(['target_category', 'currency', 'account_from', 'user', 'team']));
    }

    public function update(UpdateTargetRequest $request, Target $target)
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

    public function destroy(Target $target)
    {
        abort_if(Gate::denies('target_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $target->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}