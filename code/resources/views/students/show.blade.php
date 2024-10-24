<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Estudiante: {{ $student->name . " " . $student->lastname}}</h1>
    <ul>
        <li>DNI: {{ $student->dni }}</li>
        <li>Phone: {{ $student->phone }}</li>
        <li>Birhtdate: {{ $student->birthdate }}</li>
        <li>City: {{ $student->city->name }}</li>
        <li>
            @if ($student->user)
                User: {{ $student->user->name }}
            @else
                No tiene usuario asignado.
            @endif
        </li>
    </ul>
    <a href="{{ route('students.edit', $student) }}">Edit</a>

    <form method="POST" action="{{ route('students.destroy', $student) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
