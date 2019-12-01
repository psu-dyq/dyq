@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Event
                    </p>
                </div>
@if (Auth::user()->hasPermission('event'))
                <div class="row justify-content-center pb-4">
                    <a class="btn btn-primary" href="{{ route('event.create') }}">Create</a>
                </div>
@endif
                <table class="table table-striped">
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
                                <td><a href="{{ route('event.event', ['id' => $event->id])}}">{{ $event->name }}</a></td>
                                <td>{{ $event->start_at }}</td>
                                <td>{{ $event->end_at }}</td>
                                <td><a href="{{ route('court.court', ['id' => $event->court->id])}}">{{ $event->court->name }}</a></td>
                                <td>{{ $event->court->location }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
