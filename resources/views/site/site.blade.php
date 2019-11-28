@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <div>
            <div>
                Name
                <a href="{{ route('court.court', ['id' => $site->court->id]) }}">{{ $site->court->name }}</a>
            </div>
            <div>
                Location
                {{ $site->court->location }}
            </div>
        </div>
        <form method="post">
            @csrf
            <div>
                Level
                <input type="text" name="level" value="{{ $site->level }}">
            </div>
            <div>
                Capacity
                <input type="text" name="capacity" value="{{ $site->capacity }}">
            </div>
            <div>
                <button type="submit">Modify</button>
            </div>
        </form>
        <div>
            <a class="nav-link" href="{{ route('site.delete', ['id' => $site->id]) }}">Delete</a>
        </div>
    </div>
@endsection
