@extends ('frame')

@section ('frame-content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Employee</th>
                </tr>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isEmployee()?'Yes':'' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
