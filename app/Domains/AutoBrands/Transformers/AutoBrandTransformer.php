<?php


namespace Domains\AutoBrands\Transformers;


use Domains\AutoBrands\DataTransferObjects\AutoBrandData;

class AutoBrandTransformer extends \Parents\Transformers\Transformer
{
    public function transform(AutoBrandData $autoBrand): array
    {
        return array(
            'id' => $autoBrand->id,
            'name' => $autoBrand->name,
            'description' => $autoBrand->description,
        );
    }

}
