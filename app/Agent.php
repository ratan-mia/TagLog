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
        'one_year'   => 'One Year',
    ];

    const LEAVING_PERIOD_SELECT = [
        'six_months' => 'Six Months',
        'one_year'   => 'One Year',
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
        'one_year'   => 'One Year',
    ];

    protected $fillable = [
        'map',
        'name',
        'overview',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'banner_text',
        'workers_sent',
        'total_expense',
        'banner_titile',
        'language_level',
        'leaving_period',
        'interview_period',

    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function agentExperiences()
    {
        return $this->hasMany(Experience::class, 'agent_id', 'id');
    }

    public function agentsEmployers()
    {
        return $this->belongsToMany(Employer::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
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

    public function employers()
    {
        return $this->belongsToMany(User::class);
    }
    public function locations() {
       return $this->morphMany(Location::class,'location');
    }

    public function scopeFilterByRequest($query, Request $request)
    {

        if ($request->input('destination_id')) {
            $query->destinations()->wherePivot('destination_id', $request->input('destination_id'));
        }

        if ($request->input('visa_type')) {
            $query->where('visa_type', $request->input('visa_type'));
        }
        if ($request->input('country_id')) {
            $query->countries()->wherePivot('country_id', $request->input('country_id'));
        }

        if ($request->input('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }


//        if ($request->input('search')) {
//            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
//        }

        return $query;
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
