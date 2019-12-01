@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Ticket
                    </p>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Court</th>
                            <th scope="col">Location</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td><a href="{{ route('event.event', ['id' => $ticket->eventPrice->event->id])}}">{{ $ticket->eventPrice->event->name }}</a></td>
                                <td>{{ $ticket->eventPrice->event->start_at }}</td>
                                <td>{{ $ticket->eventPrice->event->end_at }}</td>
                                <td><a href="{{ route('court.court', ['id' => $ticket->eventPrice->event->court->id])}}">{{ $ticket->eventPrice->event->court->name }}</a></td>
                                <td>{{ $ticket->eventPrice->event->court->location }}</td>
                                <td><a href="{{ route('site.site', ['id' => $ticket->eventPrice->site->id])}}">{{ $ticket->eventPrice->site->level }}</a></td>
                                <td><a href="{{ route('ticket.cancel', ['id' => $ticket->id]) }}">Cancel</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
