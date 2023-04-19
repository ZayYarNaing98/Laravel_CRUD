@extends('backend.layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary">Create New Post</h2>
        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required />

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" required />
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" name="is_active" type="checkbox" role="switch" />
                <label class="form-check-label" >Active or Inactive</label>
              </div>

            <button type="submit" class="btn btn-success mt-3">Create</button>
        </form>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
