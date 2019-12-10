<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Destination extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    const AGENTS_SELECT = [

    ];

    const LANGUAGE_SELECT = [

    ];

    public $table = 'destinations';

    const INDUSTRIES_SELECT = [

    ];

    protected $appends = [
        'flag',
        'gallery',
        'documents',
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
        'safety',
        'agents',
        'address',
        'culture',
        'currency',
        'politics',
        'language',
        'employers',
        'insurance',
        'updated_at',
        'created_at',
        'deleted_at',
        'healthcare',
        'industries',
        'yearly_salary',
        'hourly_salary',
        'safe_medicine',
        'taxi_available',
        'monthly_salary',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
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

    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents')->last();
    }
}
