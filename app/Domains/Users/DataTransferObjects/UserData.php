<?php
declare(strict_types=1);

namespace Domains\Users\DataTransferObjects;

use Carbon\Carbon;
use Domains\Currencies\Models\Currency;
use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\Requests\Request;


final class UserData extends \Parents\DataTransferObjects\ObjectData
{
    public int $id;

    public string $name;

    public string $email;

    public ?Carbon $email_verified_at;

    public bool $approved;

    public bool $verified;

    public ?Carbon $verified_at;

    public ?Carbon $created_at;

    public string $login;

    public int $operations_number = 10;

    public int $budget_day_start = 1;

    public Currency $primary_currency;

    public ?string $timezone;

    public ?string $phone;

    public ?TeamData $team;

    public string $language;

    public bool $google_sync;

    public bool $email_notify;

    public RoleDataCollection $roles;
    
    public int $mail_days_before;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'login' => $request->get('login'),
            'operations_number' => (int) $request->get('operations_number'),
            'budget_day_start' => (int) $request->get('budget_day_start')
        ]);
    }

    public static function fromModel(User $user): self
    {
        return new self([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'approved' => (bool) $user->approved,
            'verified' => (bool) $user->verified,
            'verified_at' => self::generateCarbonObject($user->verified_at),
            'created_at' => $user->created_at,
            'login' => $user->login,
            'operations_number' => $user->operations_number,
            'budget_day_start' => $user->budget_day_start,
            'primary_currency' => $user->currency,
            'timezone' => $user->timezone,
            'phone' => $user->phone,
            'team' => TeamData::fromModel($user->team),
            'language' => $user->language,
            'google_sync' => (bool) $user->google_sync,
            'roles' => RoleDataCollection::fromArray($user->roles->all()),
            'email_notify' => (bool) $user->email_notify,
            'mail_days_before' => (int) $user->mail_days_before
        ]);
    }

}
