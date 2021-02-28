<?php


namespace Domains\Operations\Enums;


final class TypeSelectEnum extends \Parents\Enums\Enum
{
    const EXPENSE = 0;

    const INCOME = 1;

    const TRANSACTION = 2;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
