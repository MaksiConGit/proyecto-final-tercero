<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Carreras</h1>
    <a href="{{route('careers.create')}}">create</a>
    <ul>
        @foreach ($careers as $career)
        <li><a href="{{route('careers.show', [$career])}}"> {{$career->name}}</a></li>
        @endforeach
    </ul>
    <hr>
    <h4>Carreras Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{$trash->name}}</li>
        @endforeach
    </ul>
</body>
</html>
