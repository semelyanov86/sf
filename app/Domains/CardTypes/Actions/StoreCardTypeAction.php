<?php


namespace Domains\CardTypes\Actions;


use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Domains\CardTypes\Models\CardType;
use Domains\CardTypes\ViewModels\CardTypeViewModel;

class StoreCardTypeAction extends \Parents\Actions\Action
{
    public function __invoke(CardTypeData $dto): CardTypeViewModel
    {
        $cardType = CardType::create($dto->toArray());
        return new CardTypeViewModel(CardTypeData::fromModel($cardType));
    }
}
