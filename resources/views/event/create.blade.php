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
                <input type="text" name="name">
            </div>
            <div>
                Start at
                <input type="datetime-local" name="start_at">
            </div>
            <div>
                End at
                <input type="datetime-local" name="end_at">
            </div>
            <div>
                Court
                <select name="court">
                    @foreach (App\Court::all() as $court)
                        <option value="{{ $court->id }}">{{ $court->name }}</option>

                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
