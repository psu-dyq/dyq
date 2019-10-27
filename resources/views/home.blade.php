@extends ('frame')

@section ('frame-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    @if (Auth::user()->verified)
                        Your email is verified.
                    @else
                        Your email has not been verified.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
