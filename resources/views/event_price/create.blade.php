@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (isset($result))
                    <div class="alert alert-primary">
                        {{ $result }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Create Price</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Event</label>
                                <label class="col-md-6">
                                    <a href="{{ route('event.event', ['id' => $event->id]) }}">{{ $event->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Start At</label>
                                <label class="col-md-6">
                                    {{ $event->start_at }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">End At</label>
                                <label class="col-md-6">
                                    {{ $event->end_at }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Court</label>
                                <label class="col-md-6">
                                    <a href="{{ route('court.court', ['id' => $event->court->id]) }}">{{ $event->court->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Site</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('site') is-invalid @enderror" name="site">
                                        @foreach ($event->court->sites as $site)
                                            @if ($event->eventPrices->where('site_id', $site->id)->count())
                                                @continue
                                            @endif
                                            <option value="{{ $site->id }}" {{ $site->id==old('site')?'selected':'' }}>{{ $site->level }}</option>
                                        @endforeach
                                    </select>
                                    @error ('site')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Price</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ old('price') }}">
                                    @error ('price')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
