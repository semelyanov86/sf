<?php


namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Illuminate\Support\Collection;

final class AccountExtraDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): AccountExtraData
    {
        return parent::current();
    }

    /**
     * @param  AccountsExtra[]  $data
     * @return AccountExtraDataCollection
     */
    public static function fromArray(array $data): AccountExtraDataCollection
    {
        return new self(
            array_map(fn(AccountsExtra $item) => AccountExtraData::fromModel($item), $data)
        );
    }

    /**
     * @param  AccountsExtra[]  $data
     * @return AccountExtraDataCollection
     */
    public static function fromCollection(Collection $data): AccountExtraDataCollection
    {
        $newData = $data->map(fn(Account $item) => AccountExtraData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
