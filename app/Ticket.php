<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = 'Ticket';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function eventPrice()
    {
        return $this->belongsTo('App\EventPrice');
    }
}
