@extends('backend.layout.master')
@section('content')

            <div class="container">
                <h2>Show List</h2>
                <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm mb-3">Back</a>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Descritpion</th>
                    </tr>
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->description }}</td>
                    </tr>

                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @endsection
