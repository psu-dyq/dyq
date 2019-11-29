@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-1">
                <nav class="nav flex-column">
                    @if (true)
                        <a class="nav-link {{ Request::is('home')?' disabled':'' }}" href="{{ route('home') }}">Home</a>
                    @endif
                    @if (true)
                        <a class="nav-link {{ Request::is('ticket')?' disabled':'' }}" href="{{ route('ticket') }}">Ticket</a>
                    @endif
                    @if (true)
                        <a class="nav-link {{ Request::is('event')?' disabled':'' }}" href="{{ route('event') }}">Event</a>
                    @endif
                    @if (true)
                        <a class="nav-link {{ Request::is('court')?' disabled':'' }}" href="{{ route('court') }}">Court</a>
                    @endif
                    @if (Auth::user()->hasPermission('user'))
                        <a class="nav-link {{ Request::is('user')?' disabled':'' }}" href="{{ route('user') }}">User</a>
                    @endif
                </nav>
            </div>
            <div class="col-11">
                @section ('frame-content')
                @show
            </div>
        </div>
    </div>
@endsection

