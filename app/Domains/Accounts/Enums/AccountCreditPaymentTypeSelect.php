<?php


namespace Domains\Accounts\Enums;


class AccountCreditPaymentTypeSelect extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const ANNUITY = 0;

    const DIFFERENTIABLE = 1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
