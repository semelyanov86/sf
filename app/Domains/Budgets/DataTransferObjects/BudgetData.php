<?php


namespace Domains\Budgets\DataTransferObjects;


use Domains\Budgets\Http\Requests\StoreBudgetRequest;
use Domains\Budgets\Http\Requests\UpdateBudgetRequest;
use Domains\Budgets\Models\Budget;
use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Users\DataTransferObjects\UserData;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Parents\ValueObjects\MoneyValueObject;

class BudgetData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public int $category_id;

    public MoneyValueObject $plan;

    public int $user_id;

    public int $team_id;

    public ?Carbon $created_at;

    public ?TeamData $team;

    public ?UserData $user;

    public ?CategoryData $category;

    public static function fromRequest(UpdateBudgetRequest|StoreBudgetRequest $request): self
    {
        $data = array(
            'category_id' => intval($request->category_id),
            'plan' => MoneyValueObject::fromFloat(floatval($request->plan)),
            'user_id' => $request->get('user_id', Auth::id()),
            'team_id' => $request->get('team_id', Auth::user()->team_id)
        );
        return new self($data);
    }

    public static function fromModel(Budget $budget): self
    {
        return new self([
            'id' => $budget->id,
            'category_id' => $budget->category_id,
            'plan' => MoneyValueObject::fromNative($budget->plan),
            'user_id' => $budget->user_id,
            'team_id' => $budget->team_id,
            'created_at' => $budget->created_at,
            'team' => $budget->team ? TeamData::fromModel($budget->team) : null,
            'user' => UserData::fromModel($budget->user),
            'category' => CategoryData::fromModel($budget->category)
        ]);
    }

}
