@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <div>
            <a class="nav-link" href="{{ route('event.create') }}">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Court</th>
                    <th scope="col">Location</th>
                </tr>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td><a class="nav-link" href="{{ route('event.event', ['id' => $event->id])}}">{{ $event->name }}</a></td>
                        <td>{{ $event->start_at }}</td>
                        <td>{{ $event->end_at }}</td>
                        <td><a class="nav-link" href="{{ route('court.court', ['id' => $event->court->id])}}">{{ $event->court->name }}</a></td>
                        <td>{{ $event->court->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
