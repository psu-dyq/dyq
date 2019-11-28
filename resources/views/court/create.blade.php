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
                Location
                <input type="text" name="location">
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
