<?php

namespace Domains\Budgets\Http\Controllers\Api;

use Parents\Controllers\Controller;
use Domains\Budgets\Http\Requests\StoreBudgetRequest;
use Domains\Budgets\Http\Requests\UpdateBudgetRequest;
use Domains\Budgets\Http\Resources\BudgetResource;
use Domains\Budgets\Models\Budget;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BudgetsApiController extends Controller
{
    public function index(): BudgetResource
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource(Budget::with(['category', 'user', 'team'])->get());
    }

    public function store(StoreBudgetRequest $request): static
    {
        $budget = Budget::create($request->all());

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Budget $budget): BudgetResource
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource($budget->load(['category', 'user', 'team']));
    }

    public function update(UpdateBudgetRequest $request, Budget $budget): static
    {
        $budget->update($request->all());

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Budget $budget): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
