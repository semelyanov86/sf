<?php


namespace Domains\AutoBrands\Actions;


use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\Models\AutoBrand;
use Domains\AutoBrands\ViewModels\AutoBrandViewModel;

class UpdateAutoBrandAction extends \Parents\Actions\Action
{
    public function __invoke(AutoBrand $autoBrand, AutoBrandData $dto): AutoBrandViewModel
    {
        $autoBrand->update($dto->toArray());
        return new AutoBrandViewModel(AutoBrandData::fromModel($autoBrand));
    }
}
