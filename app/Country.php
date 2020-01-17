<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Country extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'countries';

    const LANGUAGE_SELECT = [

    ];

    const CURRENCY_SELECT = [

    ];

    const SAFE_FOOD_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $appends = [
        'flag',
        'gallery',
        'additional_files',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const SAFE_MEDICINE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const TAXI_AVAILABLE_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $fillable = [
        'name',
        'food',
        'culture',
        'language',
        'currency',
        'religion',
        'politics',
        'transport',
        'safe_food',
        'updated_at',
        'created_at',
        'deleted_at',
        'healthcare',
        'short_code',
        'description',
        'safe_medicine',
        'taxi_available',
        'health_insurance',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function countryUsers()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }

    public function destinationCountryUsers()
    {
        return $this->hasMany(User::class, 'destination_id', 'id');
    }

    public function destinationCountryExperiences()
    {
        return $this->hasMany(Experience::class, 'destination_id', 'id');
    }

    public function destinationAgents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function countriesEmployers()
    {
        return $this->belongsToMany(Employer::class);
    }

    public function getFlagAttribute()
    {
        $file = $this->getMedia('flag')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }

    public function getAdditionalFilesAttribute()
    {
        return $this->getMedia('additional_files');
    }
}
