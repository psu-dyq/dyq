<?php

namespace App\Http\Controllers;

use App\Court;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SiteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        $data = [];
        $court = Court::find($id);
        if (!$court)
            return abort(500);
        $data['court'] = $court;
        return view('site.create', $data);
    }

    public function createPost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        $court = Court::find($id);
        if (!$court)
            return abort(500);
        $validator = Validator::make($request->all(), [
            'level' => [
                'required',
                Rule::unique('Site')->where(function ($query) use ($court) {
                    return $query->where('court_id', $court->id);
                }),
            ],
            'capacity' => 'required|integer',
        ]);
        if ($validator->fails())
            return redirect()->route('site.create', ['id' => $id])->withErrors($validator)->withInput();
        $site = new Site;
        $site->level = $request->input('level');
        $site->capacity = $request->input('capacity');
        $site->court()->associate($court);
        $site->save();
        return redirect()->route('site.site', ['id' => $site->id]);
    }

    public function site(Request $request, $id)
    {
        $data = [];
        $site = Site::find($id);
        if (!$site)
            return abort(500);
        $data['site'] = $site;
        $result = session()->get('result');
        if ($result)
            $data['result'] = $result;
        return view('site.site', $data);
    }

    public function sitePost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('court'))
            return redirect()->route('site.site', ['id' => $id]);
        $data = [];
        $site = Site::find($id);
        if (!$site)
            return abort(500);
        $validator = Validator::make($request->all(), [
            'level' => [
                'required',
                Rule::unique('Site')->ignore($site->id)->where(function ($query) use ($site) {
                    return $query->where('court_id', $site->court_id);
                }),
            ],
            'capacity' => 'required|integer',
        ]);
        if ($validator->fails())
            return redirect()->route('site.site', ['id' => $id])->withErrors($validator)->withInput();
        $site->level = $request->input('level');
        $site->capacity = $request->input('capacity');
        $site->save();
        $result = 'The site information has been modified.';
        return redirect()->route('site.site', ['id' => $id])->with(['result' => $result]);
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        $site = Site::find($id);
        if (!$site)
            return abort(500);
        $court = $site->court;
        $site->delete();
        return redirect()->route('court.court', ['id' => $court->id]);
    }
}
