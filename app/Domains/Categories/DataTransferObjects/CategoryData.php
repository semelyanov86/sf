<?php


namespace Domains\Categories\DataTransferObjects;


use Domains\Categories\Enums\CategoryTypeEnum;
use Domains\Categories\Http\Requests\StoreCategoryRequest;
use Domains\Categories\Http\Requests\UpdateCategoryRequest;
use Domains\Categories\Models\Category;
use Illuminate\Support\Carbon;

class CategoryData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public CategoryTypeEnum $type;

    public bool $is_hidden;

    public ?int $parent;

    public ?int $sys_category;

    public ?Carbon $last_used_at;

    public ?Carbon $created_at;

    public static function fromRequest(UpdateCategoryRequest|StoreCategoryRequest $request): self
    {
        return new self([
            'name' => $request->name,
            'type' => CategoryTypeEnum::fromValue((int) $request->type),
            'is_hidden' => $request->boolean('is_hidden'),
            'parent' => $request->parent,
            'sys_category' => $request->sys_category
        ]);
    }

    public static function fromModel(Category $category): self
    {
        return new self([
            'id' => $category->id,
            'name' => $category->name,
            'type' => CategoryTypeEnum::fromValue((int) $category->type),
            'is_hidden' => (bool) $category->is_hidden,
            'parent' => (int) $category->parent,
            'sys_category' => (int) $category->sys_category,
            'last_used_at' => $category->last_used_at,
            'created_at' => $category->created_at
        ]);
    }
}
