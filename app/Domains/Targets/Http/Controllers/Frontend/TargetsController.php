<?php

namespace Domains\Targets\Http\Controllers\Frontend;

use Parents\Controllers\WebController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\MassDestroyTargetRequest;
use Domains\Targets\Http\Requests\StoreTargetRequest;
use Domains\Targets\Http\Requests\UpdateTargetRequest;
use Domains\Accounts\Models\Account;
use Domains\Currencies\Models\Currency;
use Domains\Targets\Models\Target;
use Domains\Targets\Models\TargetCategory;
use Domains\Users\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TargetsController extends Controller
{
    use MediaUploadingTrait;

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('target_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $targets = Target::with(['target_category', 'currency', 'account_from', 'user', 'team', 'media'])->get();

        return view('frontend.targets.index', compact('targets'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('target_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $target_categories = TargetCategory::all()->pluck('target_category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_froms = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.targets.create', compact('target_categories', 'currencies', 'account_froms', 'users'));
    }

    public function store(StoreTargetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $target = Target::create($request->all());

        if ($request->input('image', false)) {
            $target->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $target->id]);
        }

        return redirect()->route('frontend.targets.index');
    }

    public function edit(Target $target): \Illuminate\View\View
    {
        abort_if(Gate::denies('target_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $target_categories = TargetCategory::all()->pluck('target_category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_froms = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $target->load('target_category', 'currency', 'account_from', 'user', 'team');

        return view('frontend.targets.edit', compact('target_categories', 'currencies', 'account_froms', 'users', 'target'));
    }

    public function update(UpdateTargetRequest $request, Target $target): \Illuminate\Http\RedirectResponse
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

        return redirect()->route('frontend.targets.index');
    }

    public function show(Target $target): \Illuminate\View\View
    {
        abort_if(Gate::denies('target_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $target->load('target_category', 'currency', 'account_from', 'user', 'team');

        return view('frontend.targets.show', compact('target'));
    }

    public function destroy(Target $target): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('target_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $target->delete();

        return back();
    }

    public function massDestroy(MassDestroyTargetRequest $request): \Illuminate\Http\Response
    {
        Target::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request): \Illuminate\Http\JsonResponse
    {
        abort_if(Gate::denies('target_create') && Gate::denies('target_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Target();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
