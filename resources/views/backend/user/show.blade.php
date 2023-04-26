@extends('backend.layout.master')

@section('content')
    <div class="container">
        <h2>Show List</h2>
        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <div class="card my-3">
            <div class="card-header bg-primary">
                User Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Role:</strong></p>
                    <ul>
                            @foreach ($user->roles as $row)
                                <li>{{ $row->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
@endsection
