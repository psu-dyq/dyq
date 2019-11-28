@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <div>
            <a class="nav-link" href="{{ route('court.create') }}">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                </tr>
            <tbody>
                @foreach ($courts as $court)
                    <tr>
                        <td><a class="nav-link" href="{{ route('court.court', ['id' => $court->id])}}">{{ $court->name }}</a></td>
                        <td>{{ $court->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
