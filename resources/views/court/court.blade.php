@extends ('frame')

@section ('frame-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center py-4">
                    <p class="h2">
                        Court Information
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
                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $court->name }}">
                                    @error ('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Location</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" value="{{ $court->location }}">
                                    @error ('location')
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
                    <a class="btn btn-primary" href="{{ route('court.delete', ['id' => $court->id]) }}">Delete Court</a>
                </div>
                <div class="row justify-content-center py-4">
                    <p class="h4">
                        Site
                    </p>
                </div>
                <div class="row justify-content-center pb-4">
                    <a class="btn btn-primary" href="{{ route('site.create', ['id' => $court->id]) }}">Create Site</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col">Capacity</th>
                        </tr>
                    <tbody>
                        @foreach ($court->sites as $site)
                            <tr>
                                <td><a href="{{ route('site.site', ['id' => $site->id])}}">{{ $site->level }}</a></td>
                                <td>{{ $site->capacity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
