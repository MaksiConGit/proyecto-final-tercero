<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de exámenes</h1>
    <a href="{{ route('exams.create') }}">create</a>
    <ul>
        @foreach ($exams as $exam)
            <li>
                <a href="{{ route('exams.show', [$exam]) }}"> {{ $exam->teacherSubject->subject->name . " " . $exam->number }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Exámenes Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{ $trash->teacherSubject->subject->name . ' ' . $trash->number }}</li>
        @endforeach
    </ul>
</body>

</html>
