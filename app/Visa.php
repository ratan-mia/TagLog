<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visa extends Model
{
    use SoftDeletes;

    public $table = 'visas';

    const INDUSTRIES_SELECT = [

    ];

    const COUNTRIES_RESTRICTRED_SELECT = [

    ];

    const COUNTRIES_WITHOUT_VISA_SELECT = [

    ];

    const WORK_PERMIT_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const LANGUAGE_TRANING_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $fillable = [
        'name',
        'type',
        'duration',
        'industries',
        'created_at',
        'updated_at',
        'deleted_at',
        'work_permit',
        'working_limit',
        'language_traning',
        'training_duration',
        'countries_restrictred',
        'countries_without_visa',
    ];
}
