<?php

namespace App;

use App\EmailVerification;
use App\Employee;
use App\EventPrice;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function hasAnyPermission()
    {
        return $this->id==0 || $this->permissions->count();
    }

    public function hasPermission($type)
    {
        return $this->id==0 || $this->permissions->where('type', $type)->count();
    }

    public function hasEvent($id)
    {
        return DB::table('Ticket')->join('EventPrice', 'Ticket.event_price_id', '=', 'EventPrice.id')->where('Ticket.user_id', $this->id)->where('EventPrice.event_id', $id)->count()>0;
    }

    public function hasEventPrice($id)
    {
        return $this->tickets->where('event_price_id', $id)->count()>0;
    }
}
