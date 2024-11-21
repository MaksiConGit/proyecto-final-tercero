<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Alumno {{ $student->name . ' ' . $student->lastname }}ID {{$student->id}}</h1>
    <h2>Carrera: {{ $course->career->name }} <br> Curso: {{ $course->course_number . '° ' . $course->section }} </h2>

    @foreach ($examsBySubject as $subject => $exams)
        <h3>{{ $subject }}</h3>
        <ul>Exámenes
            @foreach ($exams as $exam)
                <li><a href="{{route('students.examDetail', [$student, $course, $exam])}}">Examen N°{{ $exam->exam_number . ' - ' . \Carbon\Carbon::parse($exam->date)->toFormattedDateString() }}</a></li>
            @endforeach
        </ul>
    @endforeach

</body>

</html>
