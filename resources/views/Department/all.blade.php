<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: cursive;
            font-size: 15px;
        }
        a {
            display: block;
            width: fit-content;
            padding: 10px 20px;
            background-color: #2d3748;
            color: #a0aec0;
            text-decoration: none;
            text-transform: capitalize;
            font-size: 13px;
            border-radius: 9px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    @if(session('done'))
        {{session('done')}}
    @endif

    <a href="{{route('department.insert')}}">
        add new description
    </a>

    <table border="1px">
        <tr>
            <th>title</th>
            <th>description</th>
            <th>delete</th>
            <th>edit</th>
        </tr>

        @foreach($data as $department)
            <tr>
                <th>
                    {{$department->title}}
                </th>
                <th>
                    {{$department->content}}
                </th>
                <th>
                    <form action="{{route('department.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{$department->id}}">
                        <input type="submit" value="Delete">
                    </form>
                </th>
                <th>
                    <form action="{{route('department.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$department->id}}">
                        <input type="submit" value="Edit">
                    </form>
                </th>
            </tr>
        @endforeach
    </table>
</body>
</html>
