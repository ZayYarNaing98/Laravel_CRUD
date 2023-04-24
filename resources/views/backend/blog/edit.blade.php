@extends('backend.layout.master')
@section('content')

    <div class="container">
        <h2>Edit Blog</h2>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>

        <div class="card my-3">
            <div class="card-header bg-primary">
                Edit Blog
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('blog.update',$result->id) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $result->name }}" />

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="desc" value="{{ $result->description }}" />
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>

    </div>

@endsection
