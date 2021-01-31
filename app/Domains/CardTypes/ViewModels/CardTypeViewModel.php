<?php


namespace Domains\CardTypes\ViewModels;


use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Domains\CardTypes\Models\CardType;

class CardTypeViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CardTypeData $cardType
    )
    {}

    public function cardType(): CardTypeData
    {
        return $this->cardType ?? CardTypeData::fromModel(new CardType());
    }

}
