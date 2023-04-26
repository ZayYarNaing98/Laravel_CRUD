@extends('backend.layout.master')
@section('content')

            <div class="container">
                <h2>New Role</h2>
                <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
                <div class="card my-3">
                    <div class="card-header bg-primary">
                        Create New Role
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role.store') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" name="name" class="form-control" id="name" required />
                            </div>
                            @foreach ($data as $row)
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $row->id }}" id="flexCheckChecked" name="permission[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                      {{ $row->name }}
                                    </label>
                                  </div>
                            </div>
                            @endforeach

                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('role.index') }}" class="btn btn-warning">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @endsection
