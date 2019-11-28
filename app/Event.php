<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'Event';

    public function court()
    {
        return $this->belongsTo('App\Court');
    }

    public function eventPrices()
    {
        return $this->hasMany('App\EventPrice');
    }
}
