<?php


namespace Domains\CardTypes\Transformers;


use Domains\CardTypes\DataTransferObjects\CardTypeData;

class CardTypeTransformer extends \Parents\Transformers\Transformer
{
    public function transform(CardTypeData $cardType): array
    {
        return array(
            'id' => $cardType->id,
            'name' => $cardType->name,
            'description' => $cardType->description,
        );
    }

}
