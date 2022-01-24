<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type="text"],
        textarea,
        input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            outline: none;
            border: 1px solid #2d3748;
        }
        input[type="text"],
        textarea{
            width: 300px;
        }
        textarea {
            resize: none;
            height: 200px;
        }
    </style>
</head>
<body>

    <form method="post" action="{{route('department.update')}}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{$depart->id}}">
        <input type="text" name="title"value="{{$depart->title}}">
        <textarea name="description">{{$depart->content}}</textarea>
        <input type="submit" value="Send">
    </form>

</body>
</html>
