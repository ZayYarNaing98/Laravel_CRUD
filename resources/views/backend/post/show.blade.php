@extends('backend.layout.master')
@section('content')
    <div class="container py-5">
        <h2 class="text-center text-primary">Show List</h2>
        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->title }}</td>
                <td>{{ $result->description }}</td>
                <td>
                    @if ($result->is_active === 1)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Suspend</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
