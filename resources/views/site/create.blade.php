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
                <a href="{{ route('court.court', ['id' => $court->id]) }}">{{ $court->name }}</a>
            </div>
            <div>
                Location
                {{ $court->location }}
            </div>
        </div>
        <form method="post">
            @csrf
            <div>
                Level
                <input type="text" name="level" value="{{ old('level') }}">
                @error('level')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Capacity
                <input type="text" name="capacity" value="{{ old('capacity') }}">
                @error('capacity')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
