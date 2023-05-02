@extends('backend.layout.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Lists</h1>
                    @can('userCreate')
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-sm mt-2">Add New</a>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Handle</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>ID-{{ $row->id }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    {{ $row->email }}
                                                </span>
                                            </td>
                                            <td>
                                                @foreach ($row->roles as $role)
                                                    <span class="badge badge-info">{{ $role->name }}</span>
                                                @endforeach
                                            </td>

                                            <td>
                                                @can('userShow')
                                                    <a href="{{ route('user.show', $row->id) }}" class="btn btn-secondary btn-sm">View</a>
                                                @endcan

                                                @can('userEdit')
                                                    <a href="{{ route('user.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                @endcan

                                                @can('userDelete')
                                                    <form class="d-inline" action="{{ route('user.destroy', $row->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                                    </form>
                                                @endcan
                                            </td>
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
