<?php


namespace Domains\Accounts\Enums;


class AccountStateEnum extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const DEFAULT = 0;

    const STARRED = 1;

    const HIDDEN = 2;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
