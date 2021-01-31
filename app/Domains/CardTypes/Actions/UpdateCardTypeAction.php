<?php


namespace Domains\CardTypes\Actions;


use Domains\CardTypes\DataTransferObjects\CardTypeData;
use Domains\CardTypes\Models\CardType;
use Domains\CardTypes\ViewModels\CardTypeViewModel;

class UpdateCardTypeAction extends \Parents\Actions\Action
{
    public function __invoke(CardType $cardType, CardTypeData $dto): CardTypeViewModel
    {
        $cardType->update($dto->toArray());
        return new CardTypeViewModel(CardTypeData::fromModel($cardType));
    }
}
