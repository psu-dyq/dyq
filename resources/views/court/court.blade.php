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
                <input type="text" name="name" value="{{ $court->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div>
                Location
                <input type="text" name="location" value="{{ $court->location }}">
                @error('location')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit">Modify</button>
            </div>
        </form>
        <div>
            <a href="{{ route('site.create', ['id' => $court->id]) }}">Create site</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Level</th>
                    <th scope="col">Capacity</th>
                </tr>
            <tbody>
                @foreach ($court->sites as $site)
                    <tr>
                        <td><a class="nav-link" href="{{ route('site.site', ['id' => $site->id])}}">{{ $site->level }}</a></td>
                        <td>{{ $site->capacity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
