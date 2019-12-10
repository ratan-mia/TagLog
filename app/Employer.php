<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Employer extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'employers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'logo',
        'gallery',
        'sliders',
        'banner_image',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'days_off',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'banner_text',
        'working_hours',
        'banner_titile',
        'monthly_salary',
        'recruiting_workers',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function employerUsers()
    {
        return $this->hasMany(User::class, 'employer_id', 'id');
    }

    public function agentsUsers()
    {
        return $this->hasMany(User::class, 'agents_id', 'id');
    }

    public function employerExperiences()
    {
        return $this->hasMany(Experience::class, 'employer_id', 'id');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getBannerImageAttribute()
    {
        $file = $this->getMedia('banner_image')->last();

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

    public function getSlidersAttribute()
    {
        $files = $this->getMedia('sliders');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
