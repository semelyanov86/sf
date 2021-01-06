<?php

namespace App\Models;

use Domains\AutoBrands\Models\AutoBrand;
use Domains\Teams\Models\Team;
use Units\Auth\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AccountsExtra extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'accounts_extras';

    const ACCOUNT_DEPOSIT_TYPE_SELECT = [
        '0' => 'Renew',
        '1' => 'Non-Renew',
    ];

    const IMMOVABLES_ESTATE_TYPE_SELECT = [
        '0' => 'Home',
        '1' => 'Appartment',
    ];

    const ACCOUNT_CREDIT_PAYMENT_TYPE_SELECT = [
        '0' => 'Annuity',
        '1' => 'Differentiable',
    ];

    const AUTO_TRANSMISSION_TYPE_SELECT = [
        '1' => 'Mechanic',
        '2' => 'Automatic',
        '3' => 'Any',
        '5' => 'Robot',
        '6' => 'Variator',
    ];

    const AUTO_FUEL_TYPE_SELECT = [
        '1' => 'Benzine',
        '2' => 'Diesel',
        '3' => 'Gaz',
        '4' => 'Any',
        '5' => 'Injector',
        '6' => 'Carburetor',
        '7' => 'Hybrid',
        '8' => 'Benzine/Gaz',
        '9' => 'Electro',
    ];

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

    const ACCOUNT_INTEREST_PERIOD_SELECT = [
        '0'  => 'End of period',
        '1'  => 'Every Day',
        '2'  => 'Every Week',
        '3'  => 'Every Month at open day',
        '4'  => 'Every month at the end of month',
        '5'  => 'Every month at first day of month',
        '6'  => 'Every quarter at open day',
        '7'  => 'Every quarter at the end of quarter',
        '8'  => 'Every 6 month',
        '9'  => 'Every year',
        '10' => 'After Custom Interval',
    ];

    protected $fillable = [
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

    public function card_type()
    {
        return $this->belongsTo(CardType::class, 'card_type_id');
    }

    public function getCardExpireDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCardExpireDateAttribute($value)
    {
        $this->attributes['card_expire_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAccountOpenDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAccountOpenDateAttribute($value)
    {
        $this->attributes['account_open_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAccountCloseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAccountCloseDateAttribute($value)
    {
        $this->attributes['account_close_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLoanGiveDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLoanGiveDateAttribute($value)
    {
        $this->attributes['loan_give_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLoanTakeDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLoanTakeDateAttribute($value)
    {
        $this->attributes['loan_take_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImmovablesPurchaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setImmovablesPurchaseDateAttribute($value)
    {
        $this->attributes['immovables_purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function auto_brand()
    {
        return $this->belongsTo(AutoBrand::class, 'auto_brand_id');
    }

    public function getAutoPurchaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAutoPurchaseDateAttribute($value)
    {
        $this->attributes['auto_purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getCardYearCostAttribute($value)
    {
        return $value ? money($value, \Auth::user()->currency->code) : null;
    }

    public function setCardYearCostAttribute($value)
    {
        $this->attributes['card_year_cost'] = $value ? $value * 100 : null;
    }
}
