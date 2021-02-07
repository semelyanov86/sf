<?php


namespace Domains\Categories\Transformers;


use Domains\Categories\DataTransferObjects\CategoryData;

class CategoryTransformer extends \Parents\Transformers\Transformer
{
    public function transform(CategoryData $categoryData): array
    {
        return array(
            'id' => $categoryData->id,
            'name' => $categoryData->name,
            'type' => [
                'id' => $categoryData->type->value,
                'value' => $categoryData->type->description
            ],
            'is_hidden' => $categoryData->is_hidden,
            'parent' => $categoryData->parent,
            'sys_category' => $categoryData->sys_category,
            'last_used_at' => $categoryData->last_used_at,
            'created_at' => $categoryData->created_at
        );
    }
}
