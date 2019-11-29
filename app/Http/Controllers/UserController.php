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
        if (!Auth::user()->isEmployee())
            return redirect('home');
        return view('user.index', ['users' => User::all()]);
    }

    public function user($id)
    {
        $data = [];
        $user = User::find($id);
        $data['user'] = $user;
        return view('user.user', $data);
    }

    public function addEmployee($id)
    {
        if (!Auth::user()->isEmployee())
            return redirect('home');
        $result = '';
        $user = User::find($id);
        if ($user && !$user->isEmployee())
        {
            $e = new Employee;
            $e->user()->associate($user);
            $e->save();
            $result = $user->name.' is an employee now';
        }
        else
            $result = 'Invalid operation';
        return view('user.index', ['users' => User::all(), 'result' => $result]);
    }

    public function deleteEmployee($id)
    {
        if (!Auth::user()->isEmployee())
            return redirect('home');
        $result = '';
        $user = User::find($id);
        if ($user && $user->isEmployee())
        {
            $user->employee->delete();
            $result = $user->name.' is no longer an employee';
        }
        else
            $result = 'Invalid operation';
        return view('user.index', ['users' => User::all(), 'result' => $result]);
    }

    public function enable($id, $type)
    {
        $permission = new Permission;
        $permission->user()->associate(User::find($id));
        $permission->type = $type;
        $permission->save();
        return redirect(route('user.user', ['id' => $id]));
    }

    public function disable($id, $type)
    {
        User::find($id)->permissions->where('type', $type)->first()->delete();
        return redirect(route('user.user', ['id' => $id]));
    }
}
