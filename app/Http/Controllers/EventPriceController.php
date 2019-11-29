<?php

namespace App\Http\Controllers;

use App\Site;
use App\Event;
use App\EventPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EventPriceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $data = [];
        $event = Event::find($id);
        if (!$event)
            return abort(500);
        $data['event'] = $event;
        return view('event_price.create', $data);
    }

    public function createPost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $event = Event::find($id);
        if (!$event)
            return abort(500);
        $validator = Validator::make($request->all(), [
            'price' => 'required|integer',
            'site' => [
                'required',
                'exists:Site,id',
                Rule::unique('EventPrice', 'site_id')->where(function ($query) use ($event) {
                    return $query->where('event_id', $event->id);
                }),
            ],
        ]);
        if ($validator->fails())
            return redirect()->route('event_price.create', ['id' => $id])->withErrors($validator)->withInput();
        $eventPrice = new EventPrice;
        $eventPrice->price = $request->input('price');
        $eventPrice->event()->associate($event);
        $eventPrice->site()->associate(Site::find($request->input('site')));
        $eventPrice->save();
        return redirect()->route('event_price.event_price', ['id' => $eventPrice->id]);
    }

    public function eventPrice(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $data = [];
        $eventPrice = EventPrice::find($id);
        if (!$eventPrice)
            return abort(500);
        $data['eventPrice'] = $eventPrice;
        $result = session()->get('result');
        if ($result)
            $data['result'] = $result;
        return view('event_price.event_price', $data);
    }

    public function eventPricePost(Request $request, $id)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $data = [];
        $eventPrice = EventPrice::find($id);
        if (!$eventPrice)
            return abort(500);
        $validator = Validator::make($request->all(), [
            'price' => 'required|integer',
        ]);
        if ($validator->fails())
            return redirect()->route('event_price.event_price', ['id' => $id])->withErrors($validator)->withInput();
        $eventPrice->price = $request->input('price');
        $eventPrice->save();
        $result = 'The event price information has been modified.';
        return redirect()->route('event_price.event_price', ['id' => $id])->with(['result' => $result]);
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermission('event'))
            return abort(404);
        $eventPrice = EventPrice::find($id);
        if (!$eventPrice)
            return abort(500);
        $event = $eventPrice->event;
        $eventPrice->delete();
        return redirect()->route('event.event', ['id' => $event->id]);
    }
}
