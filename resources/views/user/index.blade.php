@extends ('frame')

@section ('frame-content')
    <div class="container">
        @if (isset($result))
            <div class="alert alert-primary">
                {{ $result }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permission</th>
                </tr>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('user.user', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->hasAnyPermission()?'Yes':'' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
