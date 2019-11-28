<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    //
    protected $table = 'Court';

    public function sites()
    {
        return $this->hasMany('App\Site');
    }
}
