<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de estudiantes</h1>
    <a href="{{ route('students.create') }}">create</a>
    <ul>
        @foreach ($students as $student)
            <li><a href="{{ route('students.show', [$student]) }}"> {{ $student->name . ' ' . $student->lastname }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Estudiantes Eliminados</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{ $trash->name . ' ' . $trash->lastname }}</li>
        @endforeach
    </ul>
</body>

</html>

