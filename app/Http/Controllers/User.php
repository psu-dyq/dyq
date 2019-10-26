<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    //
    public function verify()
    {
        $response = ['result' => ''];
        $user_id = request('user');
        $code = request('code');
        $user = \App\User::find($user_id);
        if ($user==null || $user->verified || $user->emailverification==null || $user->emailVerification->code!=$code)
        {
            $response['result'] = "Invalid request";
        }
        else
        {
            $response['result'] = "Successfully verified";
            $user->verified = true;
            $user->emailVerification->user()->dissociate();
            $user->emailVerification->delete();
            $user->save();
        }
        return view('user.verify', $response);
    }
}
