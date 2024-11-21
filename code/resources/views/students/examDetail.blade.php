<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Detalles del examen N° {{ $exam->exam_number }} de la materia {{ $exam->subject->name }}</h1>
    <h3>Alumno: <b>{{$student->name . " " . $student->lastname}}</b></h3>
    @if ($grades->isEmpty())
        <p>El alumno no tomó el examen.</p>
    @else
        @foreach ($grades as $grade)
        <p>Nota del examen: {{ $grade->grade }} </p>
        @endforeach
    @endif

</body>

</html>
