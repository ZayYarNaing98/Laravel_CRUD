@extends('backend.layout.master')

@section('content')
    <div class="container">
        <h2>Show List</h2>
        <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <div class="card my-3">
            <div class="card-header bg-primary">
                Role Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $role->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Permissions:</strong></p>
                        <ul>
                            @foreach ($role->permissions as $row)
                                <li>{{ $row->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
