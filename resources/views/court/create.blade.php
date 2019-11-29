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
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Location
                <input type="text" name="location" value="{{ old('location') }}">
                @error('location')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
