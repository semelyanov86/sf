<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\User;
use Illuminate\Support\Collection;

class UserDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): UserData
    {
        return parent::current();
    }

    /**
     * @param  User[]  $data
     * @return UserDataCollection
     */
    public static function fromArray(array $data): UserDataCollection
    {
        return new self(
            array_map(fn(User $item) => UserData::fromModel($item), $data)
        );
    }

    /**
     * @param  User[]  $data
     * @return UserDataCollection
     */
    public static function fromCollection(Collection $data): UserDataCollection
    {
        $newData = $data->map(fn(User $item) => UserData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
