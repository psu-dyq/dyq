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
                <a href="{{ route('event.event', ['id' => $eventPrice->event->id] )}}">{{ $eventPrice->event->name }}</a>
            </div>
            <div>
                Start at
                {{ $eventPrice->event->start_at }}
            </div>
            <div>
                End at
                {{ $eventPrice->event->end_at }}
            </div>
            <div>
                Court
                <a href="{{ route('court.court', ['id' => $eventPrice->event->court->id]) }}">{{ $eventPrice->event->court->name }}</a>
            </div>
        </form>
        <form method="post">
            @csrf
            <div>
                Level
                {{ $eventPrice->site->level }}
            </div>
            <div>
                Price
                <input type="text" name="price" value="{{ $eventPrice->price }}">
                @error ('price')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit">Modify</button>
            </div>
        </form>
        <div>
            <a class="nav-link" href="{{ route('event_price.delete', ['id' => $eventPrice->id]) }}">Delete</a>
        </div>
    </div>
@endsection
