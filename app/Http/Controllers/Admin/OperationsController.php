<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOperationRequest;
use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Operation;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OperationsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Operation::with(['source_account', 'to_account', 'category', 'user', 'team'])->select(sprintf('%s.*', (new Operation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'operation_show';
                $editGate      = 'operation_edit';
                $deleteGate    = 'operation_delete';
                $crudRoutePart = 'operations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });

            $table->addColumn('source_account_name', function ($row) {
                return $row->source_account ? $row->source_account->name : '';
            });

            $table->editColumn('type', function ($row) {
                return $row->type ? Operation::TYPE_SELECT[$row->type] : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'source_account', 'category']);

            return $table->make(true);
        }

        $accounts   = Account::get();
        $categories = Category::get();
        $users      = User::get();
        $teams      = Team::get();

        return view('admin.operations.index', compact('accounts', 'categories', 'users', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('operation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $source_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $to_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.operations.create', compact('source_accounts', 'to_accounts', 'categories', 'users'));
    }

    public function store(StoreOperationRequest $request)
    {
        $operation = Operation::create($request->all());

        if ($request->input('attachment', false)) {
            $operation->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $operation->id]);
        }

        return redirect()->route('admin.operations.index');
    }

    public function edit(Operation $operation)
    {
        abort_if(Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $source_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $to_accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operation->load('source_account', 'to_account', 'category', 'user', 'team');

        return view('admin.operations.edit', compact('source_accounts', 'to_accounts', 'categories', 'users', 'operation'));
    }

    public function update(UpdateOperationRequest $request, Operation $operation)
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

        return redirect()->route('admin.operations.index');
    }

    public function show(Operation $operation)
    {
        abort_if(Gate::denies('operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->load('source_account', 'to_account', 'category', 'user', 'team');

        return view('admin.operations.show', compact('operation'));
    }

    public function destroy(Operation $operation)
    {
        abort_if(Gate::denies('operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->delete();

        return back();
    }

    public function massDestroy(MassDestroyOperationRequest $request)
    {
        Operation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('operation_create') && Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Operation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
