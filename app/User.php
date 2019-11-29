<?php

namespace App;

use App\EmailVerification;
use App\Employee;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    
    protected $table = 'User';

    public function emailVerification()
    {
        return $this->hasOne('App\EmailVerification');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function isEmployee()
    {
        return $this->id==0 || $this->employee!=null;
    }

    public function hasAnyPermission()
    {
        return $this->id==0 || $this->permissions->count();
    }

    public function hasPermission($type)
    {
        return $this->id==0 || $this->permissions->where('type', $type)->count();
    }
}
