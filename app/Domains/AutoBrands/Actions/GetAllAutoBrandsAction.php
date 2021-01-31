<?php


namespace Domains\AutoBrands\Actions;


use Domains\AutoBrands\DataTransferObjects\AutoBrandDataCollection;
use Domains\AutoBrands\Models\AutoBrand;
use Domains\AutoBrands\ViewModels\AutoBrandListViewModel;

class GetAllAutoBrandsAction extends \Parents\Actions\Action
{
    public function __invoke(): AutoBrandListViewModel
    {
        return new AutoBrandListViewModel(AutoBrandDataCollection::fromCollection(AutoBrand::all()));
    }
}
