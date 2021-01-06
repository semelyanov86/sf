<?php

namespace Domains\Countries\Models;

use Domains\Banks\Models\Bank;
use Domains\Countries\Factories\CountryFactory;
use Parents\Models\Model;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

class Country extends Model
{

    public $table = 'countries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'short_code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function countryBanks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Bank::class, 'country_id', 'id');
    }
}
