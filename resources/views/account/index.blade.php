@extends ('account.layout')

@section ('account-content')
    <div class="content">
        @if (isset($result))
            <div class="alert alert-primary">{{ $result }}</div>
        @endif
        <div class="row justify-content-center">Profile</div>
        <div class="row justify-content-center">
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
                        <input name="phone" value="{{ Auth::user()->phone }}">
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
@endsection

