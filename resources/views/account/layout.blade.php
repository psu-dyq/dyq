@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-1">
                <nav class="nav flex-column">
                    <a class="nav-link {{ Request::is('account')?' disabled':'' }}" href="{{ route('account') }}">Dashboard</a>
                    <a class="nav-link {{ Request::is('account/password')?' disabled':'' }}" href="{{ route('account.password') }}">Password</a>
                </nav>
            </div>
            <div class="col-11">
                @section ('account-content')
                @show
            </div>
        </div>
    </div>
@endsection

