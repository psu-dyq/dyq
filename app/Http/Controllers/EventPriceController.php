<?php

namespace App\Http\Controllers;

use App\Site;
use App\Event;
use App\EventPrice;
use Illuminate\Http\Request;

class EventPriceController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            $eventPrice = new EventPrice;
            $eventPrice->price = $request->input('price');
            $eventPrice->event()->associate(Event::find($id));
            $eventPrice->site()->associate(Site::find($request->input('site')));
            $eventPrice->save();
            return redirect(route('event_price.event_price', ['id' => $eventPrice->id]));
        }
        return view('event_price.create', ['event' => Event::find($id)]);
    }

    public function eventPrice(Request $request, $id)
    {
        $data = [];
        $eventPrice = EventPrice::find($id);
        if ($request->isMethod('post'))
        {
            $eventPrice->price = $request->input('price');
            $eventPrice->save();
            $data['result'] = 'The event price information has been modified.';
        }
        $data['eventPrice'] = $eventPrice;
        return view('event_price.event_price', $data);
    }

    public function delete($id)
    {
        $eventPrice = EventPrice::find($id);
        $event = $eventPrice->event;
        $eventPrice->delete();
        return redirect(route('event.event', ['id' => $event->id]));
    }
}
