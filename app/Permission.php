<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'Permission';

    public static $Permissions = [
        'event',
        'court',
        'user',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
