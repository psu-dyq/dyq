<?php

namespace App\Http\Controllers;

use App\EventPrice;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];
        $data['tickets'] = Auth::user()->tickets;
        return view('ticket.index', $data);
    }

    public function buy($id)
    {
        $user = Auth::user();
        $eventPrice = EventPrice::find($id);
        if (!$eventPrice)
            return abort(500);
        if ($user->hasEvent($eventPrice->event_id))
            return abort(500);
        $ticket = new Ticket;
        $ticket->user()->associate($user);
        $ticket->eventPrice()->associate($eventPrice);
        $ticket->save();
        if (Ticket::where('event_price_id', $eventPrice->id)->count()>$eventPrice->site->capacity)
        {
            $ticket->delete();
            return abort(500);
        }
        return redirect()->route('ticket');
    }

    public function cancel($id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket)
            return abort(500);
        $ticket->delete();
        return redirect()->route('ticket');
    }
}
