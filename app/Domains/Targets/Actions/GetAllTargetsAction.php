<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetDataCollection;
use Domains\Targets\Models\Target;
use Domains\Targets\ViewModels\TargetListViewModel;

class GetAllTargetsAction extends \Parents\Actions\Action
{
    public function __invoke(): TargetListViewModel
    {
        $targets = Target::with(['target_category', 'currency', 'account_from', 'user', 'team'])->get();
        return new TargetListViewModel(TargetDataCollection::fromCollection($targets));
    }
}
