<x-app-layout>

    <body>
        <strong>Institución "{{ $career->institution->name }}"</strong>
        <h1>Carrera: {{ $career->name }}</h1>

        @can('careers.edit')
            <a href="{{ route('careers.edit', $career) }}">Edit ></a>
        @endcan

        @can('careers.destroy')
            <form method="POST" action="{{ route('careers.destroy', $career) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete ></button>
            </form>
        @endcan

        @can('courses.create')
            <a href="{{ route('courses.create', $career) }}">Asignar Cursos ></a>
        @endcan


        <hr>
        <h2>Cursos:</h2>
        <ul>
            @foreach ($courses as $course)
                <li>
                    <strong>
                        <a href="{{ route('courses.show', $course) }}">
                            {{ $course->course_number . '° ' . $course->section }} > </a>
                    </strong>
                </li>
            @endforeach
        </ul>

        <hr>

        <h2>Profesores</h2>
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>

                    @can('students.edit')
                        <td>Usuario</td>
                        <td>Rol</td>
                        <td>Acciones</td>
                    @endcan
                </tr>

                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->lastname }}</td>
                        @can('see.info')
                            <td>{{ $teacher->user->name }}</td>
                            <td>{{ $teacher->user->name }}</td>
                            <td>
                                @can('teachers.edit')
                                    <a href="{{ route('teachers.edit', [$teacher, $course]) }}">Edit ></a>
                                @endcan

                                @can('teachers.destroy')
                                    <form method="POST" action="{{ route('teachers.destroy', $teacher) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete ></button>
                                    </form>
                                @endcan

                            </td>
                        @endcan

                    </tr>
                @endforeach

            </table>
            {{ $teachers->links() }}
        </div>

        <hr>

        <h2>Alumnos</h2>
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    @can('students.edit')
                        <td>Usuario</td>
                        <td>Rol</td>
                        <td>Acciones</td>
                    @endcan
                </tr>

                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        @can('see.info')
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>
                                @can('students.edit')
                                    <a href="{{ route('students.edit', [$student, $course]) }}">Edit ></a>
                                @endcan

                                @can('students.destory')
                                    <form method="POST" action="{{ route('students.destroy', $student) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete ></button>
                                    </form>
                                @endcan

                            </td>
                        @endcan

                    </tr>
                @endforeach
                {{ $students->links() }}

            </table>
        </div>

        <hr>

        <h2>Materias</h2>
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    @can('students.edit')
                        <td>Acciones</td>
                    @endcan
                </tr>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        @can('see.info')
                            <td>
                                @can('subjects.edit')
                                    <a href="{{ route('subjects.edit', $subject) }}">Edit ></a>
                                @endcan

                                @can('subjects.destroy')
                                    <form method="POST" action="{{ route('subjects.destroy', $subject) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete ></button>
                                    </form>
                                @endcan

                            </td>
                        @endcan

                    </tr>
                @endforeach
                {{ $subjects->links() }}
            </table>
        </div>

    </body>
</x-app-layout>
