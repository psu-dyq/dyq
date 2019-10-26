<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function index()
    {
        return view('user.index');
    }

    public function password(Request $request)
    {
        $response = ['post' => false];
        if ($request->isMethod('post'))
        {
            $response['post'] = true;
            if (!Hash::check($request->input('password'), Auth::user()->password))
                $response['result'] = 'Incorrect password';
            else if ($request->input('new_password')!=$request->input('new_password_confirmation'))
                $response['result'] = 'New passwords do not match';
            else
            {
                $response['result'] = "The password has been changed";
                $user = Auth::user();
                $user->password = Hash::make($request->input('new_password'));
                $user->save();
            }
        }
        return view('user.password', $response);
    }
}
