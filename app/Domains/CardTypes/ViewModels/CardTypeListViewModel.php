<?php


namespace Domains\CardTypes\ViewModels;


use Domains\CardTypes\DataTransferObjects\CardTypeDataCollection;
use Domains\CardTypes\Models\CardType;

class CardTypeListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CardTypeDataCollection $cardTypes
    )
    {}

    public function cardTypes(): CardTypeDataCollection
    {
        return $this->cardTypes ?? CardTypeDataCollection::fromCollection(CardType::all());
    }
}
