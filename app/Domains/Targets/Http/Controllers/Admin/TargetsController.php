<?php

namespace Domains\Targets\Http\Controllers\Admin;

use Domains\Targets\Enums\TargetStatusEnum;
use Domains\Targets\Http\Requests\CreateTargetsRequest;
use Domains\Targets\Http\Requests\DeleteTargetRequest;
use Domains\Targets\Http\Requests\IndexTargetsRequest;
use Domains\Targets\Http\Requests\ShowTargetRequest;
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
use Yajra\DataTables\Facades\DataTables;

class TargetsController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexTargetsRequest $request)
    {
        if ($request->ajax()) {
            $query = Target::with(['target_category', 'currency', 'account_from', 'user', 'team'])->select(sprintf('%s.*', (new Target)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'target_show';
                $editGate      = 'target_edit';
                $deleteGate    = 'target_delete';
                $crudRoutePart = 'targets';

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
            $table->addColumn('target_category_target_category_name', function ($row) {
                return $row->target_category ? $row->target_category->target_category_name : '';
            });

            $table->addColumn('currency_code', function ($row) {
                return $row->currency ? $row->currency->code : '';
            });

            $table->addColumn('account_from_name', function ($row) {
                return $row->account_from ? $row->account_from->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('target_type', function ($row) {
                return $row->target_type?->description;
            });
            $table->editColumn('target_name', function ($row) {
                return $row->target_name ? $row->target_name : "";
            });
            $table->editColumn('target_status', function ($row) {
                return $row->target_status?->description;
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'target_category', 'currency', 'account_from', 'user']);

            return $table->make(true);
        }

        return view('admin.targets.index');
    }

    public function create(CreateTargetsRequest $request): \Illuminate\View\View
    {
        $target_categories = TargetCategory::all()->pluck('target_category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_froms = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.targets.create', compact('target_categories', 'currencies', 'account_froms', 'users'));
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

        return redirect()->route('admin.targets.index');
    }

    public function edit(Target $target): \Illuminate\View\View
    {
        $target_categories = TargetCategory::all()->pluck('target_category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_froms = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $target->load('target_category', 'currency', 'account_from', 'user', 'team');

        return view('admin.targets.edit', compact('target_categories', 'currencies', 'account_froms', 'users', 'target'));
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

        return redirect()->route('admin.targets.index');
    }

    public function show(ShowTargetRequest $request, Target $target): \Illuminate\View\View
    {
        $target->load('target_category', 'currency', 'account_from', 'user', 'team');

        return view('admin.targets.show', compact('target'));
    }

    public function destroy(DeleteTargetRequest $request, Target $target): \Illuminate\Http\RedirectResponse
    {
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
