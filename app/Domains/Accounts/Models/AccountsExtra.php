<?php

namespace Domains\Accounts\Models;

use Domains\AutoBrands\Models\AutoBrand;
use Domains\CardTypes\Models\CardType;
use Domains\Teams\Models\Team;
use Parents\ValueObjects\MoneyValueObject;
use Units\Auth\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Parents\Models\Model;
use \DateTimeInterface;

class AccountsExtra extends Model
{
    use MultiTenantModelTrait;

    public $table = 'accounts_extras';

    protected $dates = [
        'card_expire_date',
        'created_at',
        'account_open_date',
        'account_close_date',
        'loan_give_date',
        'loan_take_date',
        'immovables_purchase_date',
        'auto_purchase_date',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'card_type_id',
        'card_expire_date',
        'card_year_cost',
        'card_rate_balance',
        'card_atm_commission',
        'card_other_atm_commission',
        'card_credit_limit',
        'card_credit_interest_rate',
        'created_at',
        'card_credit_grace_period',
        'card_credit_min_payment_percent',
        'card_credit_min_payment_day',
        'card_credit_annual_service_cost',
        'account_open_date',
        'account_interest_rate',
        'account_close_date',
        'account_is_capitalization',
        'account_interest_period',
        'account_deposit_type',
        'account_credit_payment_type',
        'account_credit_one_time_commission',
        'account_credit_monthly_commission',
        'account_credit_payment_day',
        'loan_give_date',
        'loan_take_date',
        'loan_debitor_email',
        'loan_debitor_phone',
        'loan_interest_rate',
        'immovables_estate_type',
        'immovables_living_space',
        'immovables_usable_space',
        'immovables_landing_plot',
        'immovables_distance_to_city',
        'immovables_floor',
        'immovables_count_floor',
        'immovables_city',
        'immovables_district',
        'immovables_purchase_date',
        'auto_transport_type',
        'auto_brand_id',
        'auto_model',
        'auto_modification',
        'auto_fuel_type',
        'auto_transmission_type',
        'auto_color',
        'auto_year',
        'auto_engine_size',
        'auto_region',
        'auto_mileage',
        'auto_purchase_date',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<CardType>
     */
    public function card_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CardType::class, 'card_type_id');
    }

    public function getCardExpireDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCardExpireDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['card_expire_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAccountOpenDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAccountOpenDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['account_open_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAccountCloseDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAccountCloseDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['account_close_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLoanGiveDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLoanGiveDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['loan_give_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLoanTakeDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLoanTakeDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['loan_take_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImmovablesPurchaseDateAttribute($value): ?string
    {
        /** @psalm-suppress PossiblyFalseReference */
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setImmovablesPurchaseDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['immovables_purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<AutoBrand>
     */
    public function auto_brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AutoBrand::class, 'auto_brand_id');
    }

    public function getAutoPurchaseDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAutoPurchaseDateAttribute($value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['auto_purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Team>
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getCardYearCostAttribute($value): ?\Akaunting\Money\Money
    {
        $code = \Auth::user()?->currency?->code;
        if (!$code) {
            return null;
        }
        return $value ? money($value, $code) : null;
    }

    public function setCardYearCostAttribute(?MoneyValueObject $value): void
    {
        $this->attributes['card_year_cost'] = $value ? $value->toInt() : null;
    }

    public function setCardCreditLimitAttribute(?MoneyValueObject $value): void
    {
        $this->attributes['card_credit_limit'] = $value ? $value->toInt() : null;
    }
}
