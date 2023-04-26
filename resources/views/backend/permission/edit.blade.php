@extends('backend.layout.master')
@section('content')

    <div class="container">
        <h2>Edit Permission</h2>
        <a href="{{ route('permission.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>

        <div class="card my-3">
            <div class="card-header bg-primary">
                Edit Permission
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('permission.update',$result->id) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $result->name }}" />

                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('permission.index') }}" class="btn btn-warning text-white">Cancel</a>
                </form>
            </div>
        </div>

    </div>

@endsection
