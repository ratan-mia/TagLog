<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
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
        'city_id',
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


    public function experiences()
    {
        return $this->hasMany(Experience::class, 'employer_id', 'id');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }

    public function visas()
    {
        return $this->belongsToMany(Visa::class);
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'location');
    }


    public $destination_id = '';
    public $industry_id = '';
    public $visa_type = '';

    public function scopeFilterByRequest($query, Request $request)
    {
        $this->destination_id = $request->input('destination_id');
        $this->industry_id = $request->input('industry_id');
        $this->visa_type = $request->input('visa_type');

        if ($request->input('destination_id')) {

            $query->whereHas('destinations', function ($query) {

                $query->where('destination_id', $this->destination_id);
            });
        }


        if ($request->input('visa_type')) {

            $query->whereHas('visas', function ($query) {

                $query->where('visa_id', $this->visa_type);
            });
        }

//        if ($request->input('visa_type')) {
//            $query->where('visa_type', $request->input('visa_type'));
//        }
        if ($request->input('industry_id')) {

            $query->whereHas('industries', function ($query) {

                $query->where('industry_id', $this->industry_id);
            });

        }

        if ($request->input('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }


        return $query;
    }


    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getBannerImageAttribute()
    {
        $file = $this->getMedia('banner_image')->last();

        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }

    public function getSlidersAttribute()
    {
        $files = $this->getMedia('sliders');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
