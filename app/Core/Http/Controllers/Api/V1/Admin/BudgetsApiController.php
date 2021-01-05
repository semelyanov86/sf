<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\StoreBudgetRequest;
use App\Http\Controllers\Requests\UpdateBudgetRequest;
use App\Http\Controllers\Resources\Admin\BudgetResource;
use App\Models\Budget;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BudgetsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource(Budget::with(['category', 'user', 'team'])->get());
    }

    public function store(StoreBudgetRequest $request)
    {
        $budget = Budget::create($request->all());

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource($budget->load(['category', 'user', 'team']));
    }

    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        $budget->update($request->all());

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Budget $budget)
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
