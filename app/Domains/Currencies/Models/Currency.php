<?php

namespace Domains\Currencies\Models;

use Carbon\Carbon;
use Domains\Users\Models\User;
use Parents\Models\Model;
use \DateTimeInterface;

class Currency extends Model
{

    public $table = 'currencies';

    protected $dates = [
        'update_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'course',
        'update_date',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getUpdateDateAttribute(?string $value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUpdateDateAttribute(?string $value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['update_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User>
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
