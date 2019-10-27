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
                    <th scope="col">Employee</th>
                    <th scope="col">Action</th>
                </tr>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isEmployee()?'Yes':'' }}</td>
                        <td>
                            @if (!$user->isEmployee())
                                <a href="{{ route('user.addemployee', ['id' => $user->id]) }}">Add employee</a>
                            @else
                                <a href="{{ route('user.deleteemployee', ['id' => $user->id]) }}">Delete employee</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
