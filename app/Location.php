<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['address', 'latitude','longitude'];


    public function location(){
        return $this->morphTo();
    }
}
