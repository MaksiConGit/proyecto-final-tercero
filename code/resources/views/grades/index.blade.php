<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de Notas</h1>
    <a href="{{ route('grades.create') }}">create</a>
    {{-- <ul>

        @foreach ($grades as $grade)
            <li>
                <a href="{{ route('grades.show', [$grade]) }}">
                    {{ $grade->exam ? 'Materia: ' . $grade->exam->teacherSubject->subject->name . ' Número de parcial: ' . $grade->exam->number : 'No exam' }}
                    {{ 'Nota: ' . $grade->grade }} {{ 'grade_id: ' . $grade->id }}
                </a>
            </li>
        @endforeach
        <br>
        <br>
        <br>
        @foreach ($subjectsWithExams as $subject)
        
            <li>
                <h3>
                    {{ $subject->name }} {{ $subject->exam }}
                </h3>

            </li>
        
        @endforeach

        </ul> --}}


        <ul>
            
            @foreach ($subjectsWithExams as $subject)
                <li>
                    <h3>{{ $subject->name }} ({{ count($subject->exams) }}) </h3>
                </li>

                <ul>
                    @foreach ($subject->exams->sortBy('number') as $exam)
                        <li>
                            Examen {{ $exam->number }} ({{ count($exam->grades) }})
                        </li>

                        <ul>
                            @foreach ($exam->grades as $grade)
                                <li>
                                    <a href="{{ route('grades.show', [$grade]) }}">
                                        Estudiante: {{ $grade->student->name }}, {{ $grade->student->lastname }} | Nota: {{ $grade->grade }}
                                    </a>            
                                </li>
                            @endforeach
                        </ul>

                    @endforeach
                </ul>

            @endforeach

        </ul>


    <hr>
    <h4>Notas Eliminadas</h4>
    <ul>
            
        @foreach ($subjectWithExamsTrashed as $subjectTrash)

            
            <li>
                <h3>{{ $subjectTrash->name }} ({{ count($subjectTrash->exams) }}) </h3>
            </li>

            <ul>
                @foreach ($subjectTrash->exams->sortBy('number') as $exam)
                    <li>
                        Examen {{ $exam->number }} ({{ count($exam->grades) }})
                    </li>

                    <ul>
                        @foreach ($exam->grades as $grade)
                            <li>
                                Estudiante: {{ $grade->student->name }}, {{ $grade->student->lastname }} | Nota: {{ $grade->grade }}
                            </li>
                        @endforeach
                    </ul>

                @endforeach
            </ul>

        @endforeach

    </ul>
</body>

</html>
