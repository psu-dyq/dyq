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
                {{ $user->name }}
            </div>
            <div>
                Email
                {{ $user->email }}
            </div>
            <div>
                Phone
                {{ $user->phone }}
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            <tbody>
                @foreach (['event', 'court', 'user'] as $type)
                    <tr>
                        <td>{{ $type }}</td>
                        <td>{{ $user->hasPermission($type)?'Yes':'' }}</td>
                        <td>
                            @if ($user->id)
                                <a href="{{ route('user.'.($user->hasPermission($type)?'disable':'enable'), ['id' => $user->id, 'type' => $type]) }}">{{ $user->hasPermission($type)?'Disable':'Enable' }}</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
