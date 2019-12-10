<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Industry extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'industries';

    const TRAINING_LEVEL_SELECT = [

    ];

    const EDUCATION_LEVEL_SELECT = [

    ];

    const LANGUAGE_COURSE_LEVEL_SELECT = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const LANGUAGE_COURSE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $appends = [
        'icon',
        'logo',
        'gallery',
        'sliders',
        'banner_image',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'banner_text',
        'banner_titile',
        'minimum_salary',
        'maximum_salary',
        'training_level',
        'education_level',
        'language_course',
        'language_course_level',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function indurstryUsers()
    {
        return $this->hasMany(User::class, 'indurstry_id', 'id');
    }

    public function industryExperiences()
    {
        return $this->hasMany(Experience::class, 'industry_id', 'id');
    }

    public function industryAgents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function industriesEmployers()
    {
        return $this->belongsToMany(Employer::class);
    }

    public function expectedIndustriesUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function getIconAttribute()
    {
        $file = $this->getMedia('icon')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
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
