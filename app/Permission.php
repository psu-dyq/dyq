<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'Permission';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
