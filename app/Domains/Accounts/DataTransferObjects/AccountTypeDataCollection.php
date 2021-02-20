<?php


namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Models\AccountType;
use Illuminate\Support\Collection;

class AccountTypeDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): AccountTypeData
    {
        return parent::current();
    }

    /**
     * @param  AccountType[]  $data
     * @return AccountTypeDataCollection
     */
    public static function fromArray(array $data): AccountTypeDataCollection
    {
        return new self(
            array_map(fn(AccountType $item) => AccountTypeData::fromModel($item), $data)
        );
    }

    /**
     * @param  AccountType[]  $data
     * @return AccountTypeDataCollection
     */
    public static function fromCollection(Collection $data): AccountTypeDataCollection
    {
        $newData = $data->map(fn(AccountType $item) => AccountTypeData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
