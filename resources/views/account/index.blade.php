@extends ('account.layout')

@section ('account-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (isset($result))
                    <div class="alert alert-primary">{{ $result }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Name</label>
                                <label class="col-md-6">{{ Auth::user()->name }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Email</label>
                                <label class="col-md-6">{{ Auth::user()->email }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Phone</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Account Verification</label>
                                <label class="col-md-6">{{ Auth::user()->verified?'Verified':'Not Verified' }}</label>
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

