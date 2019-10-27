<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'Employee';

    public function user()
    {
        return $this->belongsTo('App\Employee');
    }
}
