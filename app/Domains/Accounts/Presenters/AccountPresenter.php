<?php


namespace Domains\Accounts\Presenters;

use Domains\Accounts\Transformers\AccountDataTransformer;
use Parents\Presenters\Presenter;

final class AccountPresenter extends Presenter
{

    public function getTransformer(): AccountDataTransformer
    {
        return new AccountDataTransformer();
    }
}
