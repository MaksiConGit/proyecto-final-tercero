<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Profesor: {{ $teacher->name }}</h1>
    <ul>
        <li>DNI: {{ $teacher->dni }}</li>
        <li>Phone: {{ $teacher->phone }}</li>
        <li>Birhtdate: {{ $teacher->birthdate }}</li>
        <li>City: {{ $teacher->city->name }}</li>
        <li>
            @if ($teacher->user)
                User: {{ $teacher->user->name }}
            @else
                No tiene usuario asignado.
            @endif
        </li>
    </ul>
    <a href="{{ route('teachers.edit', $teacher) }}">Edit</a>

    <form method="POST" action="{{ route('teachers.destroy', $teacher) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
