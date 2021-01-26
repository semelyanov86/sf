<?php


namespace Domains\Users\Transformers;


use Domains\Teams\Transformers\TeamTransformer;
use Domains\Users\DataTransferObjects\UserData;

class UserTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['roles', 'team'];

    public function transform(UserData $userData): array
    {
        return array(
            'id' => $userData->id,
            'name' => $userData->name,
            'email' => $userData->email,
            'operations_number' => $userData->operations_number,
            'budget_day_start' => $userData->budget_day_start,
//            'primary_currency' => $userData->primary_currency,
            'timezone' => $userData->timezone,
            'phone' => $userData->phone,
            'language' => $userData->language,
        );
    }

    public function includeRoles(UserData $userData): \League\Fractal\Resource\Collection
    {
        return $this->collection($userData->roles, new RoleTransformer());
    }

    public function includeTeam(UserData $userData): \League\Fractal\Resource\Item
    {
        return $this->item($userData->team, new TeamTransformer());
    }

}
