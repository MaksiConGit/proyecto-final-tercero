<x-template-layout>
    <div class="d-block m-auto mt-0">

        <h1>Lista de exámenes</h1>

        <!-- Tabla con lista de exámenes -->
        <div class="table-responsive text-nowrap">
            <table class="table card-table">
                <thead>
                    <tr>
                        <th>Examen</th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Curso</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($exams as $exam)
                        <tr class="table-hover-row">
                            <!-- Columna de Examen -->
                            <td>
                                <a href="{{ route('exams.show', [$exam]) }}" class="text-decoration-none text-dark">
                                    {{ $exam->teacherSubject->subject->name }}
                                </a>
                            </td>
                            <!-- Columna de Materia -->
                            <td>
                                
                            </td>
                            <!-- Columna de Profesor -->
                            <td>
                                @if ($exam->teacherSubject->teacher)
                                    <a href="{{ route('teachers.profile', [$exam->teacherSubject->teacher->id]) }}"
                                        class="text-decoration-none text-primary">
                                        {{ $exam->teacherSubject->teacher->name }}
                                    </a>
                                @else
                                    No asignado
                                @endif
                            </td>
                            <!-- Columna de Curso -->
                            <td>
                                {{ $exam->teacherSubject->course->name ?? 'No especificado' }}
                            </td>
                            <!-- Columna de Fecha -->
                            <td>
                                {{ \Carbon\Carbon::parse($exam->date)->format('d/m/Y') ?? 'Fecha no disponible' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



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
