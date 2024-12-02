<x-template-layout>
    <div class="container">
        <x-icon-dropdown>
            <x-slot name="titulo">Estudiante: {{ $student->name . ' ' . $student->lastname }}</x-slot>
            <x-slot name="subtitulo">
                <p class="mb-4" style="white-space: nowrap;">Datos</p>
            </x-slot>
            <x-slot name="url_editar">{{ route('students.edit', $student) }}</x-slot>
            <x-slot name="url_eliminar">
                {{ route('students.destroy', $student) }}
            </x-slot>
        </x-icon-dropdown>

        <ul>
            <li>DNI: {{ $student->dni }}</li>
            <li>Phone: {{ $student->phone }}</li>
            <li>Birhtdate: {{ $student->birthdate }}</li>
            <li>City: {{ $student->city ? $student->city->name : 'Sin ciudad asignada.' }}</li>
            <li>
                @if ($student->user)
                    User: {{ $student->user->name }}
                @else
                    No tiene usuario asignado.
                @endif
            </li>
        </ul>

        <h5>Asistencia General Promedio</h5>

        <p>-- Aca irian las asistencias o debajo de todo --</p>

        <x-acordion>
            <x-slot name="numero">1</x-slot>
            <x-slot name="titulo">Cursos</x-slot>
            <x-slot name="body">

                <x-table>
                    <x-slot name="table_head">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>División</th>
                                <th>Carrera</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </x-slot>

                    <x-slot name="table_body">
                        <tbody class="table-borde-bottom-0">

                            @foreach ($student->courses as $course)
                                <x-table-item>
                                    <x-slot name="fila_url">{{ route('courses.show', [$course->id]) }}</x-slot>
                                    <x-slot name="nombre">{{ $course->course_number }}</x-slot>
                                    <x-slot name="apellido">{{ $course->section }}</x-slot>
                                    <x-slot name="usuario">{{ $course->career->name }}</x-slot>
                                    <x-slot name="rol"></x-slot>
                                    <x-slot name="editar_url">{{ route('courses.edit', [$course->id]) }}</x-slot>
                                </x-table-item>
                            @endforeach
                        </tbody>
                    </x-slot>
                </x-table>

            </x-slot>

        </x-acordion>

        <x-acordion>
            <x-slot name="numero">2</x-slot>
            <x-slot name="titulo">Exámenes</x-slot>
            <x-slot name="body">

                <x-table>
                    <x-slot name="table_head">
                        <thead>
                            <tr>
                                <th>Exámen</th>
                                <th>Profesor</th>
                                <th>Materia</th>
                                <th>Nota</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </x-slot>

                    <x-slot name="table_body">
                        <tbody class="table-borde-bottom-0">

                            @foreach ($exams as $exam)
                                @php
                                    // Filtra los cursos del examen que coinciden con los cursos del estudiante actual
                                    $studentCourses = $student->courses;
                                    $examCourses = $exam->courses->intersect($studentCourses);
                                @endphp

                                @if ($examCourses->isNotEmpty())
                                    <!-- Solo muestra el examen si hay cursos válidos -->
                                    <x-table-item>
                                        <x-slot name="fila_url">{{ route('exams.show', [$exam->id]) }}</x-slot>
                                        <x-slot name="nombre">N°{{ $exam->number . ' / ' . $exam->date }}</x-slot>
                                        <x-slot
                                            name="apellido">{{ $exam->teacherSubject->teacher->name . ' ' . $exam->teacherSubject->teacher->lastname }}</x-slot>
                                        <x-slot name="usuario">
                                            {{ $exam->teacherSubject->subject->name }} de
                                            @foreach ($examCourses as $course)
                                                {{ $course->course_number }}° {{ $course->section }}
                                            @endforeach
                                        </x-slot>
                                        <x-slot name="rol">
                                            @if ($exam->grades->isNotEmpty())
                                                {{ $exam->grades->first()->grade }}
                                            @else
                                                No realizado
                                            @endif
                                        </x-slot>
                                        <x-slot name="editar_url">{{ route('exams.edit', [$exam->id]) }}</x-slot>
                                    </x-table-item>
                                @endif
                            @endforeach
                        </tbody>
                    </x-slot>
                </x-table>

            </x-slot>

        </x-acordion>

    </div>
</x-template-layout>
