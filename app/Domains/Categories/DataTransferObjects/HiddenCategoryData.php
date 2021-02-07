<?php


namespace Domains\Categories\DataTransferObjects;


use Domains\Categories\Http\Requests\StoreHiddenCategoryRequest;
use Domains\Categories\Http\Requests\UpdateHiddenCategoryRequest;
use Domains\Categories\Models\HiddenCategory;
use Domains\Users\DataTransferObjects\UserData;
use Illuminate\Support\Carbon;

class HiddenCategoryData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public int $category_id;

    public ?CategoryData $category;

    public int $user_id;

    public ?UserData $user;

    public ?Carbon $created_at;

    public ?Carbon $updated_at;

    public static function fromRequest(StoreHiddenCategoryRequest|UpdateHiddenCategoryRequest $request): self
    {
        return new self([
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);
    }

    public static function fromModel(HiddenCategory $category): self
    {
        return new self([
            'id' => $category->id,
            'category_id' => (int) $category->category_id,
            'user_id' => (int) $category->user_id,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'user' => UserData::fromModel($category->user),
            'category' => CategoryData::fromModel($category->category)
        ]);
    }
}
