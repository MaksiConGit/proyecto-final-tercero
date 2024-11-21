<x-template-layout>
    <div class="d-block m-auto mt-0">

        <h1>Lista de exámenes</h1>
        <ul>
            @foreach ($exams as $exam)
                <li class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action" href="{{ route('exams.show', [$exam]) }}">
                        {{ $exam->teacherSubject->subject->name . ' ' . $exam->number }}</a>
                    {{ $exam->teacherSubject->teacher ? '' : '(profesor no asignado)' }}
                </li>
            @endforeach
        </ul>
        {{-- <hr> --}}
        {{-- <h4>Exámenes Eliminados</h4> --}}
        {{-- <ul> --}}
        {{-- @foreach ($trashed as $trash) --}}

        {{-- Obtiene la materia del examen aunque estuviera eliminada  --}}
        {{-- @php
            $subject = $trash->teacherSubject->subject()->withTrashed()->first();
        @endphp --}}

        {{-- Si la materia está eliminada, lo escribe igual y especifica que así es --}}
        {{-- <li>
            {{ $subject->name . ' ' . $trash->number }}
            {{ $subject && $subject->trashed() ? '(materia eliminada)' : '' }}
        </li>

        @endforeach
    </ul> --}}
    </div>
    <x-floating-icon-exams></x-floating-icon-exams>
</x-template-layout>
