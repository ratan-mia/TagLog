<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Interview extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'interviews';

    const EMPLOYER_SELECT = [
        'matching_guide' => 'Matching Guide',
    ];

    const RESULT_SELECT = [
        'short_listed' => 'Short Listed',
        'passed' => 'Passed',
        'not_passed' => 'Not Passed',
    ];

    protected $dates = [
        'created_at',
        'start_date',
        'updated_at',
        'deleted_at',
        'interview_date',
    ];

    const INDUSTRY_SELECT = [
        'car_industry' => 'Car Industry',
        'garments' => 'Garments',
        'constructions' => 'Contstructions',
    ];

    const VISA_TYPE_SELECT = [
        '1' => 'Technical Intern Trainee',
        '2' => 'Specified Skilled Worker',
        '3' => 'Highly Skilled Professional',
    ];

    protected $fillable = [
        'agent_id',
        'result',
        'user_id',
        'industry_id',
        'employer_id',
        'visa_type',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'interview_date',
        'contact_to_taglog',
    ];

    const AGENT_SELECT = [
        'poly_trade_international' => 'Poly Trade International',
        'asian_imports_limited' => 'Asian Imports Limited',
        'continental_motors' => 'Continenal Motors',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function visa()
    {

        return $this->belongsTo(Visa::class, 'visa_type');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function getInterviewDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setInterviewDateAttribute($value)
    {
        $this->attributes['interview_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
