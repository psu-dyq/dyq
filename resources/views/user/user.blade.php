@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        User Information
                    </p>
                </div>
                @if (isset($result))
                    <div class="alert alert-primary">
                        {{ $result }}
                    </div>
                @endif
                <div class="card mb-5 pt-3">
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Name</label>
                                <label class="col-md-6">{{ $user->name }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Email</label>
                                <label class="col-md-6">{{ $user->email }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Phone</label>
                                <label class="col-md-6">{{ $user->phone }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Account Verification</label>
                                <label class="col-md-6">{{ $user->verified?'Verified':'Not Verified' }}</label>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        @foreach (App\Permission::$Permissions as $type)
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
        </div>
    </div>
@endsection
