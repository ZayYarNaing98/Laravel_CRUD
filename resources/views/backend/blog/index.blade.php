@extends('backend.layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Lists</h1>
                    @can('blogCreate')
                        <a href="{{ route('blog.create') }}" class="btn btn-success btn-sm mt-2">Add New</a>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">BlogList with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="blog" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Author</th>
                                        <th>Handle</th>
                                        <th>Handle</th>
                                        @can('blogDelete')
                                            <th>Handle</th>
                                        @endcan

                                </thead>
                                <tbody>

                                    @foreach ($data as $val)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>ID-{{ $val->id }}</td>
                                            <td>{{ $val->name }}</td>
                                            <td><div class="mb-3">
                                                <label for="image"></label>
                                            </div>
                                                <img src={{ asset('blog_image/' . $val->image) }} alt="image" style="width:50px; height:50px" />
                                            </td>
                                            <td>{{ $val->description }}</td>
                                            <td>
                                                {{ $val->author->name }}
                                            </td>


                                            @can('blogEdit')
                                                <td>
                                                    <a href="{{ route('blog.edit', $val->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>

                                                </td>
                                            @endcan

                                            @can('blogShow')
                                                <td>
                                                    <a href="{{ route('blog.show', $val->id) }}"
                                                        class="btn btn-secondary btn-sm">View</a>
                                                </td>
                                            @endcan

                                            @can('blogDelete')
                                                <td>
                                                    <form class="d-inline" action="{{ route('blog.destroy', $val->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                                    </form>
                                                </td>
                                            @endcan

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
