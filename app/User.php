<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, HasApiTokens, HasMediaTrait;

    public $table = 'users';

    const VISA_TYPE_SELECT = [
        '1' => 'Technical Intern Trainee',
        '2' => 'Specified Skilled Worker',
    ];

    const USER_STATUS_SELECT = [
        '1' => 'Looking for Sending Organization',
        '2' => 'Currently belong to Sending Organization',
        '3' => 'Current Technical Intern Trainee',
        '4' => 'Technical Intern Trainee Alumni',
    ];

    protected $appends = [
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const GENDER_RADIO = [
        'male' => 'Male',
        'female' => 'Female',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_of_birth',
        'date_of_leaving',
        'email_verified_at',
    ];

    const EDUCATION_LEVEL_SELECT = [
        'secondary_school' => 'Secondary School',
        'higher_secondary' => 'Higher Secondary',
        'bachelor_degree' => 'Bachelor’s degree',
        'masters_degress' => 'Master\'s Degree',
    ];

    const EDUCATION_BACKGROUND_SELECT = [
        'science' => 'Science',
        'commerce' => 'Commerce',
        'arts' => 'Arts',
    ];


    const LANGUAGE_LEVEL_SELECT = [
        'N1' => 'The ability to understand Japanese used in a variety of circumstances.',
        'N2' => 'The ability to understand Japanese used in everyday situations, and in a variety of circumstances to a certain degree.',
        'N3' => 'The ability to understand Japanese used in everyday situations to a certain degree.',
        'N4' => 'The ability to understand basic Japanese.',
        'N5' => 'The ability to understand some basic Japanese.',

    ];

    protected $fillable = [
        'name',
        'city',
        'skype',
        'email',
        'phone',
        'gender',
        'facebook',
        'password',
        'visa_type',
        'user_status',
        'agents_id',
        'country_id',
        'nationality_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'employer_id',
        'indurstry_id',
        'date_of_birth',
        'remember_token',
        'education_level',
        'education_background',
        'language_level',
        'expected_salary',
        'date_of_leaving',
        'email_verified_at',
        'destination_id',
        'destination_area',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function userExperiences()
    {
        return $this->hasMany(Experience::class, 'user_id', 'id');
    }

    public function employersAgents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function destination()
    {
        return $this->belongsTo(Country::class, 'destination_id');
    }

    public function expected_industries()
    {
        return $this->belongsToMany(Industry::class);
    }

    public function visa()
    {

        return $this->belongsTo(Visa::class, 'visa_type');
    }

    public function getDateOfLeavingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfLeavingAttribute($value)
    {
        $this->attributes['date_of_leaving'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function agents()
    {
        return $this->belongsTo(Employer::class, 'agents_id');
    }

    public function indurstry()
    {
        return $this->belongsTo(Industry::class, 'indurstry_id');
    }

    public function getProfilePictureAttribute()
    {
        $file = $this->getMedia('profile_picture')->last();

        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
