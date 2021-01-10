<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\User;

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
}
