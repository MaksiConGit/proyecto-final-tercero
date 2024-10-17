<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Carrera: {{$career->name}}</h1>
    <p>Institución "{{$career->institution->name}}"</p>
    <a href="{{route('careers.edit', $career)}}">Edit</a>

    <form method="POST" action="{{route('careers.destroy', $career)}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>