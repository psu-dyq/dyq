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
                    <div class="card-header">Create Site</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Court</label>
                                <label class="col-md-6">
                                    <a href="{{ route('court.court', ['id' => $court->id]) }}">{{ $court->name }}</a>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Location</label>
                                <label class="col-md-6">
                                    {{ $court->location }}
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Level</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('level') is-invalid @enderror" type="text" name="level" value="{{ old('level') }}">
                                    @error ('level')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Capacity</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('capacity') is-invalid @enderror" type="text" name="capacity" value="{{ old('capacity') }}">
                                    @error ('capacity')
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
