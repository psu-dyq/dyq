@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Price Information
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
                                <label class="col-md-4">Event</label>
                                <label class="col-md-6">
                                    <a href="{{ route('event.event', ['id' => $eventPrice->event->id]) }}">{{ $eventPrice->event->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Start At</label>
                                <label class="col-md-6">
                                    {{ $eventPrice->event->start_at }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">End At</label>
                                <label class="col-md-6">
                                    {{ $eventPrice->event->end_at }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Court</label>
                                <label class="col-md-6">
                                    <a href="{{ route('court.court', ['id' => $eventPrice->event->court->id]) }}">{{ $eventPrice->event->court->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Site</label>
                                <label class="col-md-6">
                                    <a href="{{ route('site.site', ['id' => $eventPrice->site->id]) }}">{{ $eventPrice->site->level }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Price</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ $eventPrice->price }}">
                                    @error ('price')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Modify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center py-4">
                    <a class="btn btn-primary" href="{{ route('event_price.delete', ['id' => $eventPrice->id]) }}">Delete Price</a>
                </div>
            </div>
        </div>
    </div>
@endsection
