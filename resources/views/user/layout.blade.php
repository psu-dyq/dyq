@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-1">
                <nav class="nav flex-column">
                    <a class="nav-link {{ Request::is('user')?' disabled':'' }}" href="{{ route('user') }}">Dashboard</a>
                    <a class="nav-link {{ Request::is('user/password')?' disabled':'' }}" href="{{ route('user.password') }}">Password</a>
                </nav>
            </div>
            <div class="col-11">
                @section ('user-content')
                @show
            </div>
        </div>
    </div>
@endsection

