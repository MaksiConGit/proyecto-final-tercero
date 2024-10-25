<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nota: {{ $grade->grade }} </h1>
    <ul>
        <li>Materia: {{ $grade->exam->teacherSubject->subject->name }}
        <li>Examen: {{ $grade->exam->number }}
        <li>Estudiante: {{ $grade->student->name }}</li>
    </ul>
    <a href="{{ route('grades.edit', $grade) }}">Edit</a>

    <form method="POST" action="{{ route('grades.destroy', $grade) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
