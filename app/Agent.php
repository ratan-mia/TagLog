<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Agent extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'agents';

    const LANGUAGE_LEVEL_SELECT = [
        'six_months' => 'Six Months',
        'one_year' => 'One Year',
    ];

    const LEAVING_PERIOD_SELECT = [
        'six_months' => 'Six Months',
        'one_year' => 'One Year',
    ];

    protected $appends = [
        'logo',
        'sliders',
        'banner_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const INTERVIEW_PERIOD_SELECT = [
        'six_months' => 'Six Months',
        'one_year' => 'One Year',
    ];

    protected $fillable = [
        'map',
        'name',
        'overview',
        'email',
        'phone',
        'address',
        'city_id',
        'banner_text',
        'workers_sent',
        'total_expense',
        'banner_titile',
        'language_level',
        'leaving_period',
        'interview_period',
        'created_at',
        'updated_at',
        'deleted_at',


    ];


    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'agent_id', 'id');
    }

    public function employers()
    {
        return $this->belongsToMany(Employer::class);
    }

   

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
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
    public $country_id = '';
    public $visa_type = '';

    public function scopeFilterByRequest($query, Request $request)
    {
        $this->destination_id = $request->input('destination_id');
        $this->country_id = $request->input('country_id');
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
        if ($request->input('country_id')) {

            $query->whereHas('countries', function ($query) {

                $query->where('country_id', $this->country_id);
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
