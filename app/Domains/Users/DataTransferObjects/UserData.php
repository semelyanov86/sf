<?php
declare(strict_types=1);

namespace Domains\Users\DataTransferObjects;

use Carbon\Carbon;
use Domains\Currencies\Models\Currency;
use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Users\Http\Requests\StoreUserRequest;
use Domains\Users\Models\Role;
use Domains\Users\Models\User;
use Parents\Requests\Request;


final class UserData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public string $email;

    public ?Carbon $email_verified_at;

    public bool $approved = false;

    public bool $verified = false;

    public ?Carbon $verified_at;

    public ?Carbon $created_at;

    public string $login;

    public int $operations_number = 10;

    public int $budget_day_start = 1;

    public Currency $primary_currency;

    public ?string $timezone;

    public ?string $phone;

    public ?TeamData $team;

    public ?int $team_id;

    public string $language;

    public bool $google_sync = false;

    public bool $email_notify = false;

    public bool $sms_notify = false;

    public RoleDataCollection $roles;

    public ?int $mail_days_before;

    public ?int $sms_days_before;

    public ?string $password;

    public ?string $mail_time;

    public ?string $sms_time;

    public static function fromRequest(Request $request): self
    {
        $rolesList = $request->input('roles', []);
        $roles = collect(array());
        foreach ($rolesList as $item) {
            $roles->push(Role::whereId($item)->first());
        }
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'login' => $request->get('login'),
            'password' => $request->get('password'),
            'operations_number' => (int) $request->get('operations_number'),
            'budget_day_start' => (int) $request->get('budget_day_start'),
            'roles' => RoleDataCollection::fromCollection($roles),
            'primary_currency' => Currency::whereId($request->get('primary_currency'))->first(),
            'language' => $request->get('language'),
            'team_id' => (int) $request->get('team_id'),
            'mail_time' => $request->get('mail_time'),
            'sms_notify' => $request->boolean('sms_notify'),
            'sms_days_before' => (int) $request->get('sms_days_before'),
            'sms_time' => $request->get('sms_time')
        ]);
    }

    public static function fromModel(User $user, $withTeams = true): self
    {
        $data = [
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
            'language' => $user->language,
            'google_sync' => (bool) $user->google_sync,
            'roles' => RoleDataCollection::fromArray($user->roles->all()),
            'email_notify' => (bool) $user->email_notify,
            'mail_days_before' => (int) $user->mail_days_before,
            'mail_time' => $user->mail_time,
            'sms_notify' => (bool) $user->sms_notify,
            'sms_days_before' => (int) $user->sms_days_before,
            'sms_time' => $user->sms_time
        ];
        if ($withTeams) {
            $data['team'] = TeamData::fromModel($user->team);
            $data['team_id'] = $user->team?->id;
        }
        return new self($data);
    }

    public function toArray(): array
    {
        $result = parent::toArray();
        $result['primary_currency'] = $result['primary_currency']->id;
        $result['approved'] = (int) $result['approved'];
        $result['verified'] = (int) $result['verified'];
        return $result;
    }

    public function toModel(): User
    {
        return User::whereId($this->id)->firstOrFail();
    }

}
