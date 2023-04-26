@extends('backend.layout.master')
@section('content')
    <div class="container">
        <h2 class="">Edit Role: {{ $role->name }}</h2>
        <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <div class="card my-3">
            <div class="card-header bg-primary">
                Edit Role
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('role.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $role->name) }}" required />
                    </div>
                    @foreach ($permissions as $row)
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $row->id }}" id="permission{{ $row->id }}" @if(in_array($row->id, $rolePermissions)) checked @endif>
                            <label class="form-check-label" for="permission{{ $row->id }}">
                                {{ $row->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <a href="{{ route('role.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
