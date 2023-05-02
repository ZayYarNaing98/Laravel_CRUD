@extends('backend.layout.master')
@section('content')

    <div class="container">
        <h2>Edit Post</h2>
        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>

        <div class="card my-3">
            <div class="card-header bg-primary">
                Edit Post
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('post.update',$result->id) }}">
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

                    <div class="mb-3">
                        <label class="form-label" >Status</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="is_active"  {{ ($result->is_active === 1) ? "checked": "" }} />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>

    </div>

@endsection

