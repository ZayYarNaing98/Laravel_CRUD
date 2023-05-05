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
                <form method="POST" action="{{ route('blog.update',$result->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $result->name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ $result->image }}" />
                        <br/>
                        <img src={{ asset('blog_image/' . $result->image) }} alt="image" style="width:100px; height:100px" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="desc" value="{{ $result->description }}" />
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <select name="author_id" id="author_id" class="form-select">
                            @foreach ($data as $val)
                                <option value="{{ $val->id }}" {{ ($result->author_id == $val->id) ? 'selected' : '' }}>
                                    {{ $val->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>

    </div>

@endsection
