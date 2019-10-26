@extends ('user.layout')

@section ('user-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($post)
                    <div class="alert alert-primary">
                        {{ $result }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="password" class="col-md-4">Password</label>
                                <div class="col-md-6">
                                    <input name="password" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4">New Password</label>
                                <div class="col-md-6">
                                    <input name="new_password" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4">Confirm Password</label>
                                <div class="col-md-6">
                                    <input name="new_password_confirmation" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
