@extends('backend.layout.master')
@section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <h2>Edit Blog</h2>
                <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
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

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @endsection
