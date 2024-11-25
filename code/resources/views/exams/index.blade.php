<x-template-layout>
    <div class="container">

        <!-- Tabla con lista de exámenes -->
        <x-table>

            <x-slot name="titulo_tabla">Lista de Examen</x-slot>

            <x-slot name="table_head">
                <thead>
                    <tr>
                        <th>Examen</th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Curso</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
            </x-slot>

            <x-slot name="table_body">
                <tbody class="table-borde-bottom-0">
                    @foreach ($exams as $exam)
                        <tr class="table-hover-row">
                            <!-- Columna de Examen -->
                            <td>
                                <a> Parcial I</a>
                            </td>
                            <!-- Columna de Materia -->
                            
                            <td>
                                <a href="{{ route('exams.show', [$exam]) }}" class="text-decoration-none text-dark">
                                    {{ $exam->teacherSubject->subject->name }}
                                </a>
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
                                4A
                            </td>
                            <!-- Columna de Fecha -->
                            <td>
                                {{ \Carbon\Carbon::parse($exam->date)->format('d/m/Y') ?? 'Fecha no disponible' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-slot>
        </x-table>

        {{-- <!-- Controles de paginación -->
        <div class="mt-4">
            {{ $exams->links() }}
        </div> --}}

    </div>
    <x-floating-icon-exams></x-floating-icon-exams>
</x-template-layout>

