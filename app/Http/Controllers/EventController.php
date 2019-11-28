<?php

namespace App\Http\Controllers;

use App\Court;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $data = [];
        $data['events'] = Event::all();
        return view('event.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $event = new Event;
            $event->name = $request->input('name');
            $event->start_at = $request->input('start_at');
            $event->end_at = $request->input('end_at');
            $event->court()->associate(Court::find($request->input('court')));
            $event->save();
            return redirect(route('event.event', ['id' => $event->id]));
        }
        return view('event.create');
    }

    public function event(Request $request, $id)
    {
        $data = [];
        $event = Event::find($id);
        if ($request->isMethod('post'))
        {
            $event->name = $request->input('name');
            $event->start_at = $request->input('start_at');
            $event->end_at = $request->input('end_at');
            $event->save();
            $data['result'] = 'The event information has been modified.';
        }
        $data['event'] = $event;
        return view('event.event', $data);
    }

    public function delete($id)
    {
        Event::find($id)->delete();
        return redirect(route('event'));
    }
}
