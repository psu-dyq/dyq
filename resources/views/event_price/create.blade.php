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
                <a href="{{ route('event.event', ['id' => $event->id] )}}">{{ $event->name }}</a>
            </div>
            <div>
                Start at
                {{ $event->start_at }}
            </div>
            <div>
                End at
                {{ $event->end_at }}
            </div>
            <div>
                Court
                <a href="{{ route('court.court', ['id' => $event->court->id]) }}">{{ $event->court->name }}</a>
            </div>
        </form>
        <form method="post">
            @csrf
            <div>
                Site
                <select name="site">
                    @foreach ($event->court->sites as $site)
                        @if ($event->eventPrices->where('site_id', $site->id)->count())
                            @continue
                        @endif
                        <option value="{{ $site->id }}">{{ $site->level }}</option>

                    @endforeach
                </select>
            </div>
            <div>
                Price
                <input type="text" name="price">
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
