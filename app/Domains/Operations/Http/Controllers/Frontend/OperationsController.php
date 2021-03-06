<?php

namespace Domains\Operations\Http\Controllers\Frontend;

use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Operations\Http\Requests\MassDestroyOperationRequest;
use Domains\Operations\Http\Requests\StoreOperationRequest;
use Domains\Operations\Http\Requests\UpdateOperationRequest;
use Domains\Accounts\Models\Account;
use Domains\Categories\Models\Category;
use Domains\Operations\Models\Operation;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OperationsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operations = Operation::with(['source_account', 'to_account', 'category', 'user', 'team', 'media'])->get();

        $accounts = Account::get();

        $categories = Category::get();

        $users = User::get();

        $teams = Team::get();

        return view('frontend.operations.index', compact('operations', 'accounts', 'categories', 'users', 'teams'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('operation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $source_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $to_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.operations.create', compact('source_accounts', 'to_accounts', 'categories', 'users'));
    }

    public function store(StoreOperationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $operation = Operation::create($request->all());

        if ($request->input('attachment', false)) {
            $operation->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $operation->id]);
        }

        return redirect()->route('frontend.operations.index');
    }

    public function edit(Operation $operation): \Illuminate\View\View
    {
        abort_if(Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $source_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $to_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operation->load('source_account', 'to_account', 'category', 'user', 'team');

        return view('frontend.operations.edit', compact('source_accounts', 'to_accounts', 'categories', 'users', 'operation'));
    }

    public function update(UpdateOperationRequest $request, Operation $operation): \Illuminate\Http\RedirectResponse
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

        return redirect()->route('frontend.operations.index');
    }

    public function show(Operation $operation): \Illuminate\View\View
    {
        abort_if(Gate::denies('operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->load('source_account', 'to_account', 'category', 'user', 'team');

        return view('frontend.operations.show', compact('operation'));
    }

    public function destroy(Operation $operation): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->delete();

        return back();
    }

    public function massDestroy(MassDestroyOperationRequest $request): \Illuminate\Http\Response
    {
        Operation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request): \Illuminate\Http\JsonResponse
    {
        abort_if(Gate::denies('operation_create') && Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Operation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
