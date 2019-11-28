<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    //
    public function index()
    {
        $data = [];
        $data['courts'] = Court::all();
        return view('court.index', $data);
    }

    public function create(Request $request)
    {
        $data = [];
        if ($request->isMethod('post'))
        {
            $court = new Court;
            $court->name = $request->input('name');
            $court->location = $request->input('location');
            $court->save();
            return redirect(route('court.court', ['id' => $court->id]));
        }
        return view('court.create', $data);
    }

    public function court(Request $request, $id)
    {
        $data = [];
        $court = Court::find($id);
        if ($request->isMethod('post'))
        {
            $court->name = $request->input('name');
            $court->location = $request->input('location');
            $court->save();
            $data['result'] = 'The court information has been modified.';
        }
        $data['court'] = $court;
        return view('court.court', $data);
    }
}
