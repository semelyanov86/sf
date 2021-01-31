<?php


namespace Domains\CardTypes\Actions;


use Domains\CardTypes\DataTransferObjects\CardTypeDataCollection;
use Domains\CardTypes\Models\CardType;
use Domains\CardTypes\ViewModels\CardTypeListViewModel;

class GetAllCardTypesAction extends \Parents\Actions\Action
{
    public function __invoke(): CardTypeListViewModel
    {
        $cardTypes = CardTypeDataCollection::fromCollection(CardType::all());
        return new CardTypeListViewModel($cardTypes);
    }
}
