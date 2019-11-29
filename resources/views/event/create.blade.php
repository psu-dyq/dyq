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
                @error ('name')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Start at
                <input type="datetime-local" name="start_at" value="{{ old('start_at') }}">
                @error ('start_at')
                    {{ $message }}
                @enderror
            </div>
            <div>
                End at
                <input type="datetime-local" name="end_at" value="{{ old('end_at') }}">
                @error ('end_at')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Court
                <select name="court">
                    @foreach (App\Court::all() as $court)
                        <option value="{{ $court->id }}" {{ $court->id==old('court')?'selected':'' }}>{{ $court->name }}</option>
                    @endforeach
                </select>
                @error ('court')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
