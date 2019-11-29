<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::user()->hasPermission('user'))
            return abort(404);
        return view('user.index', ['users' => User::all()]);
    }

    public function user($id)
    {
        if (!Auth::user()->hasPermission('user'))
            return abort(404);
        $data = [];
        $user = User::find($id);
        if (!$user)
            return abort(500);
        $data['user'] = $user;
        return view('user.user', $data);
    }

    public function enable($id, $type)
    {
        if (!Auth::user()->hasPermission('user'))
            return abort(404);
        if (!in_array($type, Permission::$Permissions))
            return abort(500);
        $user = User::find($id);
        if (!$user)
            return abort(500);
        $permission = new Permission;
        $permission->user()->associate($user);
        $permission->type = $type;
        try
        {
            $permission->save();
        }
        catch (\Exception $e)
        {
            if (!$user->hasPermission($type))
                return abort(500);
        }
        return redirect()->route('user.user', ['id' => $id]);
    }

    public function disable($id, $type)
    {
        if (!Auth::user()->hasPermission('user'))
            return abort(404);
        if (!in_array($type, Permission::$Permissions))
            return abort(500);
        $user = User::find($id);
        if (!$user)
            return abort(500);
        $permission = $user->permissions->where('type', $type)->first();
        if ($permission)
            $permission->delete();
        return redirect()->route('user.user', ['id' => $id]);
    }
}
