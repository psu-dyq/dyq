@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Site Information
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
                                <label class="col-md-4">Court</label>
                                <label class="col-md-6">
                                    <a href="{{ route('court.court', ['id' => $site->court->id]) }}">{{ $site->court->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Location</label>
                                <label class="col-md-6">
                                    {{ $site->court->location }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Level</label>
@if (Auth::user()->hasPermission('court'))
                                <div class="col-md-6">
                                    <input class="form-control @error('level') is-invalid @enderror" type="text" name="level" value="{{ $site->level }}">
                                    @error ('level')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
@else
                                <label class="col-md-6">{{ $site->level }}</label>
@endif
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Capacity</label>
@if (Auth::user()->hasPermission('court'))
                                <div class="col-md-6">
                                    <input class="form-control @error('capacity') is-invalid @enderror" type="text" name="capacity" value="{{ $site->capacity }}">
                                    @error ('capacity')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
@else
                                <label class="col-md-6">{{ $site->capacity }}</label>
@endif
                            </div>
@if (Auth::user()->hasPermission('court'))
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Modify</button>
                                </div>
                            </div>
@endif
                        </form>
                    </div>
                </div>
@if (Auth::user()->hasPermission('court'))
                <div class="row justify-content-center py-4">
                    <a class="btn btn-primary" href="{{ route('site.delete', ['id' => $site->id]) }}">Delete Site</a>
                </div>
@endif
            </div>
        </div>
    </div>
@endsection
