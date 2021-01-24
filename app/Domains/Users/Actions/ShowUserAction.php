<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\ViewModels\UserEditViewModel;
use Domains\Users\ViewModels\UserShowViewModel;

class ShowUserAction extends \Parents\Actions\Action
{
    public function __invoke(?UserData $dto = null): UserShowViewModel
    {
        return new UserShowViewModel($dto);
    }
}
