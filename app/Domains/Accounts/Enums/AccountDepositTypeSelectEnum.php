<?php


namespace Domains\Accounts\Enums;


class AccountDepositTypeSelectEnum extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const RENEW = 0;

    const NON_RENEW = 1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
