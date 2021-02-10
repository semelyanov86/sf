<?php

namespace Domains\Budgets\Http\Controllers\Api;

use Domains\Budgets\Actions\GetAllBudgetsAction;
use Domains\Budgets\Actions\ShowBudgetAction;
use Domains\Budgets\Actions\StoreBudgetAction;
use Domains\Budgets\Actions\UpdateBudgetAction;
use Domains\Budgets\DataTransferObjects\BudgetData;
use Domains\Budgets\Http\Requests\DeleteBudgetRequest;
use Domains\Budgets\Http\Requests\IndexBudgetsRequest;
use Domains\Budgets\Http\Requests\ShowBudgetRequest;
use Domains\Budgets\Transformers\BudgetTransformer;
use Parents\Controllers\Controller;
use Domains\Budgets\Http\Requests\StoreBudgetRequest;
use Domains\Budgets\Http\Requests\UpdateBudgetRequest;
use Domains\Budgets\Models\Budget;
use Symfony\Component\HttpFoundation\Response;

class BudgetsApiController extends Controller
{
    public function index(IndexBudgetsRequest $request, GetAllBudgetsAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->budgets(), new BudgetTransformer())->respond();
    }

    public function store(StoreBudgetRequest $request, StoreBudgetAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action(BudgetData::fromRequest($request))->budget(), new BudgetTransformer())
            ->respond(Response::HTTP_CREATED);
    }

    public function show(ShowBudgetRequest $request, Budget $budget, ShowBudgetAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action($budget)->budget(), new BudgetTransformer())->parseIncludes(['user', 'team', 'category'])->respond();
    }

    public function update(UpdateBudgetRequest $request, Budget $budget, UpdateBudgetAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($budget, BudgetData::fromRequest($request));
        return fractal($viewModel->budget(), new BudgetTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteBudgetRequest $request, Budget $budget): \Illuminate\Http\Response
    {
        $budget->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
