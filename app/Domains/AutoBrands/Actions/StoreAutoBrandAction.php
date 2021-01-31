<?php


namespace Domains\AutoBrands\Actions;


use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\DataTransferObjects\AutoBrandDataCollection;
use Domains\AutoBrands\Models\AutoBrand;
use Domains\AutoBrands\ViewModels\AutoBrandViewModel;

class StoreAutoBrandAction extends \Parents\Actions\Action
{
    public function __invoke(AutoBrandData $dto): AutoBrandViewModel
    {
        return new AutoBrandViewModel(AutoBrandData::fromModel(AutoBrand::create($dto->toArray())));
    }
}
