<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de Directivos</h1>
    <a href="{{ route('principals.create') }}">create</a>
    <ul>
        @foreach ($principals as $principal)
            <li><a href="{{ route('principals.show', [$principal]) }}"> {{ $principal->name . ' ' . $principal->lastname }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Directivos Eliminados</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{ $trash->name . ' ' . $trash->lastname }}</li>
        @endforeach
    </ul>
</body>

</html>
