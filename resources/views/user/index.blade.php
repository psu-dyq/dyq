@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        User
                    </p>
                </div>
                <table class="table table-striped">
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
        </div>
    </div>
@endsection
