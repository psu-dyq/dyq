<?php

namespace App\Http\Controllers;

use App\EventPrice;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //
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
        $ticket = new Ticket;
        $ticket->user()->associate($user);
        $ticket->eventPrice()->associate($eventPrice);
        $ticket->save();
        return redirect(route('ticket'));
    }

    public function cancel($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect(route('ticket'));
    }
}
