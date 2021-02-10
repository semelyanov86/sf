<?php

namespace Domains\Budgets\Http\Controllers\Admin;

use Domains\Budgets\Actions\ShowBudgetAction;
use Domains\Budgets\Actions\StoreBudgetAction;
use Domains\Budgets\Actions\UpdateBudgetAction;
use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Http\Requests\CreateBudgetRequest;
use Domains\Budgets\Http\Requests\DeleteBudgetRequest;
use Domains\Budgets\Http\Requests\IndexBudgetsRequest;
use Domains\Budgets\Http\Requests\ShowBudgetRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Budgets\Http\Requests\MassDestroyBudgetRequest;
use Domains\Budgets\Http\Requests\StoreBudgetRequest;
use Domains\Budgets\Http\Requests\UpdateBudgetRequest;
use Domains\Budgets\Models\Budget;
use Domains\Categories\Models\Category;
use Domains\Users\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BudgetsController extends Controller
{
    public function index(IndexBudgetsRequest $request)
    {
        if ($request->ajax()) {
            $query = Budget::with(['category', 'user', 'team'])->select(sprintf('%s.*', (new Budget)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'budget_show';
                $editGate      = 'budget_edit';
                $deleteGate    = 'budget_delete';
                $crudRoutePart = 'budgets';

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
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('plan', function ($row) {
                return $row->plan ? $row->plan : "";
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'user']);

            return $table->make(true);
        }

        return view('admin.budgets.index');
    }

    public function create(CreateBudgetRequest $request): \Illuminate\View\View
    {
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.budgets.create', compact('categories', 'users'));
    }

    public function store(StoreBudgetRequest $request, StoreBudgetAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(BudgetData::fromRequest($request));

        return redirect()->route('admin.budgets.index');
    }

    public function edit(Budget $budget): \Illuminate\View\View
    {
        abort_if(Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $budget->load('category', 'user', 'team');

        return view('admin.budgets.edit', compact('categories', 'users', 'budget'));
    }

    public function update(UpdateBudgetRequest $request, Budget $budget, UpdateBudgetAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($budget, BudgetData::fromRequest($request));

        return redirect()->route('admin.budgets.index');
    }

    public function show(ShowBudgetRequest $request, Budget $budget, ShowBudgetAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $viewModel = $action($budget);

        return view('admin.budgets.show', [
            'budget' => $viewModel->budget()
        ]);
    }

    public function destroy(DeleteBudgetRequest $request, Budget $budget): \Illuminate\Http\RedirectResponse
    {
        $budget->delete();

        return back();
    }

    public function massDestroy(MassDestroyBudgetRequest $request): \Illuminate\Http\Response
    {
        Budget::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
