<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    //
    protected $table = 'EmailVerification';
    protected $fillable = [
        'code',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getLink()
    {
        return route('user.verify', [
            'user' => $this->user->id,
            'code' => $this->user->emailVerification->code,
        ]);
    }
}
