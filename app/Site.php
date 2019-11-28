<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $table = 'site';

    public function court()
    {
        return $this->belongsTo('App\Court');
    }
}
