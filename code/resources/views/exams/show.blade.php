<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Examen: {{ $exam->teacherSubject->subject->name }} {{ $exam->number }}</h1>
    <ul>
        <li>Profesor: {{($exam->teacherSubject->teacher ? $exam->teacherSubject->teacher->name : 'No asignado')}}</li>
        <li>Fecha: {{ $exam->date }}</li>
    </ul>
    <a href="{{ route('exams.edit', $exam) }}">Edit</a>

    <form method="POST" action="{{ route('exams.destroy', $exam) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
