<?php


namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Models\Account;
use Illuminate\Support\Collection;

final class AccountDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): AccountData
    {
        return parent::current();
    }

    /**
     * @param  Account[]  $data
     * @return AccountDataCollection
     */
    public static function fromArray(array $data): AccountDataCollection
    {
        return new self(
            array_map(fn(Account $item) => AccountData::fromModel($item), $data)
        );
    }

    /**
     * @param  Account[]  $data
     * @return AccountDataCollection
     */
    public static function fromCollection(Collection $data): AccountDataCollection
    {
        $newData = $data->map(fn(Account $item) => AccountData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
