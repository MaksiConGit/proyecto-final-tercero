<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Estudiante: {{ $student->name . ' ' . $student->lastname }}</h1>
    <ul>
        <li>DNI: {{ $student->dni }}</li>
        <li>Phone: {{ $student->phone }}</li>
        <li>Birhtdate: {{ $student->birthdate }}</li>
        <li>Country: {{ $student->city->province->country->name }}</li>
        <li>Province: {{ $student->city->province->name }}</li>
        <li>City: {{ $student->city->name }}</li>
        <li>
            @if ($student->user)
                User: {{ $student->user->name }}
            @else
                No tiene usuario asignado.
            @endif
        </li>
    </ul>

    <h2>Institucion: {{ $student->user->institution->name }}</h2>
    @foreach ($coursesByCareer as $careerName => $courses)
        <h4>Carrera: {{ $careerName }}</h4>
        <ul> Cursos
            @foreach ($courses as $course)
                <li><a href="{{ route('students.courseDetail', [$student, $course]) }}">{{ $course->course_number . '° ' . $course->section}}</a></li>
            @endforeach
        </ul>
    @endforeach

    <a href="{{ route('students.edit', $student) }}">Edit</a>

    <form method="POST" action="{{ route('students.destroy', $student) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
