<?php


namespace Parents\DataTransferObjects;


use Carbon\Carbon;
use Domains\Users\DataTransferObjects\UserData;
use Illuminate\Support\Facades\Auth;

class ObjectData extends \Spatie\DataTransferObject\DataTransferObject
{
    public static function generateCarbonObject(?string $date): ?Carbon
    {
        if (!$date) {
            return null;
        }
        return \Illuminate\Support\Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $date);
    }

    protected static function getUserDto(): UserData
    {
        return UserData::fromModel(Auth::user());
    }

    protected static function getTeamId(): int
    {
        return (int) Auth::user()->team_id;
    }

    protected static function getUserId(): int
    {
        return (int) Auth::id();
    }

}
