<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;

    public $table = 'experiences';

    const VISA_TYPE_SELECT = [

    ];

    const ACCOMMODATION_TYPE_SELECT = [

    ];

    const WEEKLY_WORKING_HOURS_SELECT = [
        '1' => '48',
        '2'  => '54',
        '3'  => '60',
        '4'  => '66',
        '5'  => '72',
    ];

    const NEXT_YEAR_OPPORTUNITY_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'emloyment_date',
    ];

    const LANGUAGE_LEVEL_SELECT = [
        'six_months' => 'Six Months',
        'one_year'   => 'One Year',
    ];

    const APPLICATION_PERIOD_SELECT = [
        'six_months' => 'Six Months',
        'one_year'   => 'One Year',
        'two_years'  => 'Two Years',
    ];

    protected $fillable = [
        'user_id',
        'agent_id',
        'visa_type',
        'updated_at',
        'created_at',
        'deleted_at',
        'employer_id',
        'employer_location',
        'industry_id',
        'agent_rating',
        'visa_application_rating',
        'language_training_rating',
        'expenses_paid',
        'language_level',
        'agent_feedback',
        'emloyment_date',
        'monthly_salary',
        'employer_rating',
        'monthly_days_off',
        'employer_feedback',
        'employment_period',
        'application_period',
        'accommodation_type',
        'weekly_working_hours',
        'next_year_opportunity',
        'destination_country_id',
        'monthly_living_expenses',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function destination_country()
    {
        return $this->belongsTo(Country::class, 'destination_country_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function getEmloymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEmloymentDateAttribute($value)
    {
        $this->attributes['emloyment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
