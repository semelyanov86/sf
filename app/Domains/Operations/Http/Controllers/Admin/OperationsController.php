<?php

namespace Domains\Operations\Http\Controllers\Admin;

use Domains\Operations\Actions\CreateOperationAction;
use Domains\Operations\Actions\EditOperationAction;
use Domains\Operations\Actions\GenerateTableAction;
use Domains\Operations\Actions\StoreOperationAction;
use Domains\Operations\Actions\UpdateOperationAction;
use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Enums\TypeSelectEnum;
use Domains\Operations\Http\Requests\CreateOperationRequest;
use Domains\Operations\Http\Requests\DeleteOperationRequest;
use Domains\Operations\Http\Requests\EditOperationRequest;
use Domains\Operations\Http\Requests\IndexOperationsRequest;
use Domains\Operations\Http\Requests\ShowOperationRequest;
use Domains\Operations\ViewModels\OperationsListViewModel;
use Parents\Controllers\Controller;
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
use Yajra\DataTables\Facades\DataTables;

class OperationsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(IndexOperationsRequest $request, GenerateTableAction $tableAction): mixed
    {
        if ($request->ajax()) {
            try {
                return $tableAction()->make(true);
            } catch (\Exception $e) {
                \response('', $e->getCode())->json(['error' => $e->getMessage()]);
            }
        }

        return view('admin.operations.index', [
            'viewModel' => new OperationsListViewModel()
        ]);
    }

    public function create(CreateOperationRequest $request, CreateOperationAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.operations.create', [
            'viewModel' => $action()
        ]);
    }

    public function store(StoreOperationRequest $request, StoreOperationAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(OperationData::fromRequest($request));
        return redirect()->route('admin.operations.index');
    }

    public function edit(EditOperationRequest $request, Operation $operation, EditOperationAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.operations.edit', [
            'viewModel' => $action($operation)
        ]);
    }

    public function update(UpdateOperationRequest $request, Operation $operation, UpdateOperationAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($operation, OperationData::fromRequest($request));

        return redirect()->route('admin.operations.index');
    }

    public function show(ShowOperationRequest $request, Operation $operation, EditOperationAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.operations.show', [
            'viewModel' => $action($operation)
        ]);
    }

    public function destroy(Operation $operation, DeleteOperationRequest $request): \Illuminate\Http\RedirectResponse
    {
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
