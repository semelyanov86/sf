<?php


namespace Domains\Targets\DataTransferObjects;


use Domains\Targets\Http\Requests\StoreTargetCategoryRequest;
use Domains\Targets\Http\Requests\UpdateTargetCategoryRequest;
use Domains\Targets\Models\TargetCategory;
use Illuminate\Support\Carbon;
use Parents\ValueObjects\ImageValueObject;

class TargetCategoryData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $target_category_name;

    public int $target_category_type;

    public ?ImageValueObject $target_category_image;

    public ?Carbon $created_at;

    public ?string $ck_media;

    public static function fromRequest(StoreTargetCategoryRequest|UpdateTargetCategoryRequest $request): self
    {
        return new self([
            'target_category_name' => $request->target_category_name,
            'target_category_type' => (int) $request->target_category_type,
            'target_category_image' => ImageValueObject::fromString($request->target_category_image),
            'ck_media' => $request->input('ck-media')
        ]);
    }

    public static function fromModel(TargetCategory $targetCategory): self
    {
        return new self([
            'id' => $targetCategory->id,
            'target_category_name' => $targetCategory->target_category_name,
            'target_category_type' => (int) $targetCategory->target_category_type,
            'created_at' => $targetCategory->created_at,
            'target_category_image' => $targetCategory->target_category_image,
        ]);
    }
}
