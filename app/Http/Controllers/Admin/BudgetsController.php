<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBudgetRequest;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BudgetsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

    public function create()
    {
        abort_if(Gate::denies('budget_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.budgets.create', compact('categories', 'users'));
    }

    public function store(StoreBudgetRequest $request)
    {
        $budget = Budget::create($request->all());

        return redirect()->route('admin.budgets.index');
    }

    public function edit(Budget $budget)
    {
        abort_if(Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $budget->load('category', 'user', 'team');

        return view('admin.budgets.edit', compact('categories', 'users', 'budget'));
    }

    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        $budget->update($request->all());

        return redirect()->route('admin.budgets.index');
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->load('category', 'user', 'team');

        return view('admin.budgets.show', compact('budget'));
    }

    public function destroy(Budget $budget)
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return back();
    }

    public function massDestroy(MassDestroyBudgetRequest $request)
    {
        Budget::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
