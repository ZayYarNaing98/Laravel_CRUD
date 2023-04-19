<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('newblog.create') }} ">Add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
          <tr>

            <td>{{$val->id}}</td>
            <td>{{$val->name}}</td>
            <td>{{$val->description}}</td>
            <td><a href="{{route('newblog.edit',$val->id)}}">Edit</a></td>
            <td><a href="{{route('newblog.show',$val->id)}}">View</a></td>
            <td>
            <form action="{{route('newblog.destroy',$val->id)}}" method="POST">
                @csrf
                <button type="submit">Delete</button>
            </form>
           </td>
          </tr>
          @endforeach
        </tbody>
      </table>





</body>
</html>
