@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
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
                        <td><a class="nav-link" href="{{ route('event.event', ['id' => $ticket->eventPrice->event->id])}}">{{ $ticket->eventPrice->event->name }}</a></td>
                        <td>{{ $ticket->eventPrice->event->start_at }}</td>
                        <td>{{ $ticket->eventPrice->event->end_at }}</td>
                        <td><a class="nav-link" href="{{ route('court.court', ['id' => $ticket->eventPrice->event->court->id])}}">{{ $ticket->eventPrice->event->court->name }}</a></td>
                        <td>{{ $ticket->eventPrice->event->court->location }}</td>
                        <td>{{ $ticket->eventPrice->site->level }}</td>
                        <td><a href="{{ route('ticket.cancel', ['id' => $ticket->id]) }}">Cancel</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
