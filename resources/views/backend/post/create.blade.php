@extends('backend.layout.master')
@section('content')

            <div class="container">
                <h2>New Post</h2>
                <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
                <div class="card my-3">
                    <div class="card-header bg-primary">
                        Create New Post
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" required />

                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="description" required />
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image" />
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" name="is_active" type="checkbox" role="switch" />
                                <label class="form-check-label" >Active or Inactive</label>
                              </div>

                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                            <a href="{{ route('post.index') }}" class="btn btn-warning mt-3">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @endsection
