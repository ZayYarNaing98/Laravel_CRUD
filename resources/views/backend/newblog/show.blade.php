<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>

          </tr>
        </thead>
        <tbody>

          <tr>

            <td>{{$blog->id}}</td>
            <td>{{$blog->name}}</td>
            <td>{{$blog->description}}</td>

          </tr>

        </tbody>
      </table>
</body>
</html>
