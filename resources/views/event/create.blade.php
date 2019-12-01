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
                    <div class="card-header">Create Event</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Name</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                                    @error ('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Start At</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('start_at') is-invalid @enderror" type="datetime-local" name="start_at" value="{{ old('start_at') }}">
                                    @error ('start_at')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">End At</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('end_at') is-invalid @enderror" type="datetime-local" name="end_at" value="{{ old('end_at') }}">
                                    @error ('end_at')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Court</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('court') is-invalid @enderror" name="court">
                                        @foreach (App\Court::all() as $court)
                                            <option value="{{ $court->id }}" {{ $court->id==old('court')?'selected':'' }}>{{ $court->name }}</option>
                                        @endforeach
                                    </select>
                                    @error ('court')
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
