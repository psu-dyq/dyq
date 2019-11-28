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
            </div>
            <div>
                Start at
                <input type="datetime-local" name="start_at" value="{{ $event->start_at }}">
            </div>
            <div>
                End at
                <input type="datetime-local" name="end_at" value="{{ $event->end_at }}">
            </div>
            <div>
                Court
                <a href="{{ route('court.court', ['id' => $event->court->id]) }}">{{ $event->court->name }}</a>
            </div>
            <div>
                <button type="submit">Modify</button>
            </div>
        </form>
        <div>
            <a class="nav-link" href="{{ route('event.delete', ['id' => $event->id]) }}">Delete</a>
        </div>
    </div>
@endsection
