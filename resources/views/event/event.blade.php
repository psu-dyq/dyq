@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Event Information
                    </p>
                </div>
                @if (isset($result))
                    <div class="alert alert-primary">
                        {{ $result }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Name</label>
@if (Auth::user()->hasPermission('event'))
                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $event->name }}">
                                    @error ('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
@else
                                <label class="col-md-6">{{ $event->name }}</label>
@endif
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Start At</label>
@if (Auth::user()->hasPermission('event'))
                                <div class="col-md-6">
                                    <input class="form-control @error('start_at') is-invalid @enderror" type="datetime-local" name="start_at" value="{{ $event->start_at }}">
                                    @error ('start_at')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
@else
                                <label class="col-md-6">{{ $event->start_at }}</label>
@endif
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">End At</label>
@if (Auth::user()->hasPermission('event'))
                                <div class="col-md-6">
                                    <input class="form-control @error('end_at') is-invalid @enderror" type="datetime-local" name="end_at" value="{{ $event->end_at }}">
                                    @error ('end_at')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
@else
                                <label class="col-md-6">{{ $event->end_at }}</label>
@endif
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Court</label>
                                <label class="col-md-6">
                                    <a href="{{ route('court.court', ['id' => $event->court->id]) }}">{{ $event->court->name }}</a>
                                </label>
                            </div>
@if (Auth::user()->hasPermission('event'))
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Modify</button>
                                </div>
                            </div>
@endif
                        </form>
                    </div>
                </div>
@if (Auth::user()->hasPermission('event'))
                <div class="row justify-content-center py-4">
                    <a class="btn btn-primary" href="{{ route('event.delete', ['id' => $event->id]) }}">Delete Event</a>
                </div>
@endif
                <div class="row justify-content-center py-4">
                    <p class="h4">
                        Price
                    </p>
                </div>
@if (Auth::user()->hasPermission('event'))
                <div class="row justify-content-center pb-4">
                    <a class="btn btn-primary" href="{{ route('event_price.create', ['id' => $event->id]) }}">Create Price</a>
                </div>
@endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        @foreach ($event->eventPrices as $eventPrice)
                            <tr>
                                <td><a href="{{ route('site.site', ['id' => $eventPrice->site->id])}}">{{ $eventPrice->site->level }}</a></td>
                                <td>{{ $eventPrice->site->capacity }}</td>
                                <td><a href="{{ route('event_price.event_price', ['id' => $eventPrice->id])}}">{{ $eventPrice->price }}</a></td>
                                <td><a href="{{ route('ticket.buy', ['id' => $eventPrice->id]) }}">Buy</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
