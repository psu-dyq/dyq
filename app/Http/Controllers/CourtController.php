<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourtController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];
        $data['courts'] = Court::all();
        return view('court.index', $data);
    }

    public function create(Request $request)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        return view('court.create');
    }

    public function createPost(Request $request)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:Court',
            'location' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->route('court.create')->withErrors($validator)->withInput();
        $court = new Court;
        $court->name = $request->input('name');
        $court->location = $request->input('location');
        $court->save();
        return redirect()->route('court.court', ['id' => $court->id]);
    }

    public function court(Request $request, $id)
    {
        $data = [];
        $court = Court::find($id);
        if (!$court)
            abort(500);
        $data['court'] = $court;
        $result = session()->get('result');
        if ($result)
            $data['result'] = $result;
        return view('court.court', $data);
    }

    public function courtPost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('court'))
            return redirect()->route('court.court', ['id' => $id]);
        $court = Court::find($id);
        if (!$court)
            abort(500);
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('Court')->ignore($court->id),
            ],
            'location' => 'required',
        ]);
        if ($validator->fails())
            return redirect()->route('court.court', ['id' => $id])->withErrors($validator)->withInput();
        $court->name = $request->input('name');
        $court->location = $request->input('location');
        $court->save();
        $result = 'The court information has been modified.';
        return redirect()->route('court.court', ['id' => $id])->with(['result' => $result]);
    }
}
