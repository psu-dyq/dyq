<?php

namespace App\Http\Controllers;

use App\Court;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];
        $data['events'] = Event::all();
        return view('event.index', $data);
    }

    public function create(Request $request)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        return view('event.create');
    }

    public function createPost(Request $request)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'court' => 'required|exists:Court,id',
        ]);
        if ($validator->fails())
            return redirect()->route('event.create')->withErrors($validator)->withInput();
        $event = new Event;
        $event->name = $request->input('name');
        $event->start_at = $request->input('start_at');
        $event->end_at = $request->input('end_at');
        $event->court()->associate(Court::find($request->input('court')));
        $event->save();
        return redirect(route('event.event', ['id' => $event->id]));
    }

    public function event(Request $request, $id)
    {
        $data = [];
        $event = Event::find($id);
        if (!$event)
            return abort(500);
        $data['event'] = $event;
        $result = session()->get('result');
        if ($result)
            $data['result'] = $result;
        return view('event.event', $data);
    }

    public function eventPost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('event'))
            return redirect()->route('event.event', ['id' => $id]);
        $data = [];
        $event = Event::find($id);
        if (!$event)
            return abort(500);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
        ]);
        if ($validator->fails())
            return redirect()->route('event.event', ['id' => $id])->withErrors($validator)->withInput();
        $event->name = $request->input('name');
        $event->start_at = $request->input('start_at');
        $event->end_at = $request->input('end_at');
        $event->save();
        $result = 'The event information has been modified.';
        return redirect()->route('event.event', ['id' => $id])->with(['result' => $result]);
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermission('court'))
            return abort(404);
        $event = Event::find($id);
        if (!$event)
            return abort(500);
        $event->delete();
        return redirect()->route('event');
    }
}
