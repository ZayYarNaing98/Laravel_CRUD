@extends('backend.layout.master')
@section('content')
    <div class="container">
        <h2>Show List</h2>
        <div class="card my-3">
            <div class="card-header bg-primary">
                Blog Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> {{ $result->id }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $result->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>Image:</strong>
                            <img src="{{ asset('blog_image/' . $result->image) }}" alt="image" style="max-width: 100px; max-height: 100px;" />
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Description:</strong> {{ $result->description }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('blog.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
@endsection
