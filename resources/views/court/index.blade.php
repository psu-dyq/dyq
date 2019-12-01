@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Court
                    </p>
                </div>
                <div class="row justify-content-center pb-4">
                    <a class="btn btn-primary" href="{{ route('court.create') }}">Create</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                        </tr>
                    <tbody>
                        @foreach ($courts as $court)
                            <tr>
                                <td><a href="{{ route('court.court', ['id' => $court->id])}}">{{ $court->name }}</a></td>
                                <td>{{ $court->location }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
