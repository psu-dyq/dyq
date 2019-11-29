<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPrice extends Model
{
    //
    protected $table = 'EventPrice';

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function site()
    {
        return $this->belongsTo('App\Site');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
