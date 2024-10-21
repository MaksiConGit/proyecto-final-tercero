<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de materias</h1>
    <a href="{{route('subjects.create')}}">create</a>
    <ul>
        @foreach ($subjects as $subject)
        <li><a href="{{route('subjects.show', [$subject])}}"> {{$subject->name}}</a></li>
        @endforeach
    </ul>
</body>
</html>