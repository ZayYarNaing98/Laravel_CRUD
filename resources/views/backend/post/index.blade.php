@extends('backend.layout.master')
@section('content')
    <div class="container py-5">
        <h2 class="text-center text-primary">Post List</h2>
        <a href="{{ route('post.create') }}" class="btn btn-success btn-sm mb-4">Add New</a>

        <table class="table table-striped">
            <tr>
                <th>NO</th>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
            @forelse ($data as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->id }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->description }}</td>
                <td>

                    @if ($row->is_active === 1)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Suspend</span>
                    @endif

                </td>
                <td>
                    <a href="{{ route('post.edit',$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('post.show',$row->id) }}" class="btn btn-secondary btn-sm">Show</a>
                </td>
                <td>
                    <form action="{{ route('post.destroy', $row->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <h2 class="text-center text-danger mb-3">There is No Data!</h2>
            @endforelse
        </table>

    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
