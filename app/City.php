<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'country_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'city_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
