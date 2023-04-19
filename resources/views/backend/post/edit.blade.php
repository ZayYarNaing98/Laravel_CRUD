@extends('backend.layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary">Edit Post</h2>
        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <form action="{{ route('post.update', $result->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $result->title }}"/>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ $result->description }}" />
            </div>

            <div class="form-check form-switch">
                <label class="form-check-label" >Active or Inactive</label>
                <input type="checkbox" class="form-check-input" name="is_active"  {{ ($result->is_active === 1) ? "checked": "" }} />
              </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @endsection
