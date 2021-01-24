<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\ViewModels\UserEditViewModel;

class EditUserAction extends \Parents\Actions\Action
{
    public function __invoke(?UserData $dto = null): UserEditViewModel
    {
        return new UserEditViewModel($dto);
    }
}
