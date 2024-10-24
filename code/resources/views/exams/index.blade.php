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
                {{$exam->teacherSubject->teacher ? '' : '(profesor no asignado)'}}
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Exámenes Eliminados</h4>
    <ul>
        @foreach ($trashed as $trash)
        
        {{-- Obtiene la materia del examen aunque estuviera eliminada  --}}
        @php
            $subject = $trash->teacherSubject->subject()->withTrashed()->first();
        @endphp
    
        {{-- Si la materia está eliminada, lo escribe igual y especifica que así es --}}
        <li>
            {{ $subject->name . ' ' . $trash->number }}
            {{ $subject && $subject->trashed() ? '(materia eliminada)' : '' }}
        </li>

        @endforeach
    </ul>
</body>

</html>
