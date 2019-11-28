<?php

namespace App\Http\Controllers;

use App\Court;
use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        $data = [];
        $court = Court::find($id);
        if ($request->isMethod('post'))
        {
            $site = new Site;
            $site->level = $request->input('level');
            $site->capacity = $request->input('capacity');
            $site->court()->associate($court);
            $site->save();
            return redirect(route('site.site', ['id' => $site->id]));
        }
        $data['court'] = $court;
        return view('site.create', $data);
    }

    public function site(Request $request, $id)
    {
        $data = [];
        $site = Site::find($id);
        if ($request->isMethod('post'))
        {
            $site->level = $request->input('level');
            $site->capacity = $request->input('capacity');
            $site->save();
            $data['result'] = 'The site information has been modified.';
        }
        $data['site'] = $site;
        return view('site.site', $data);
    }

    public function delete($id)
    {
        $site = Site::find($id);
        $court = $site->court;
        $site->delete();
        return redirect(route('court.court', ['id' => $court->id]));
    }
}
