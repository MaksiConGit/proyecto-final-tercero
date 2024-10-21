<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="{{route('users.create')}}">create</a>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{route('users.show', [$user])}}"> {{$user->name}} @if ($user->is_deleted)(borrado) @endif </a></li>
        @endforeach
    </ul>
    <hr>
    <h4>Usuarios Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{$trash->name}}</li>
        @endforeach
    </ul>
</body>
</html>