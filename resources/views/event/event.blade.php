@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <form method="post">
            @csrf
            <div>
                Name
                <input type="text" name="name" value="{{ $event->name }}">
                @error ('name')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Start at
                <input type="datetime-local" name="start_at" value="{{ $event->start_at }}">
                @error ('start_at')
                    {{ $message }}
                @enderror
            </div>
            <div>
                End at
                <input type="datetime-local" name="end_at" value="{{ $event->end_at }}">
                @error ('end_at')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Court
                <a href="{{ route('court.court', ['id' => $event->court->id]) }}">{{ $event->court->name }}</a>
            </div>
            <div>
                <button type="submit">Modify</button>
            </div>
        </form>
        <a class="nav-link" href="{{ route('event_price.create', ['id' => $event->id]) }}">Create event price</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Level</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            <tbody>
                @foreach ($event->eventPrices as $eventPrice)
                    <tr>
                        <td><a href="{{ route('event_price.event_price', ['id' => $eventPrice->id]) }}">{{ $eventPrice->site->level }}</a></td>
                        <td>{{ $eventPrice->site->capacity }}</td>
                        <td>{{ $eventPrice->price }}</td>
                        <td><a href="{{ route('ticket.buy', ['id' => $eventPrice->id]) }}">Buy</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a class="nav-link" href="{{ route('event.delete', ['id' => $event->id]) }}">Delete</a>
        </div>
    </div>
@endsection
