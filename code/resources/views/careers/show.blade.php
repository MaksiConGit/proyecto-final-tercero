<x-app-layout>

    <body>
        <strong>Institución "{{ $career->institution->name }}"</strong>
        <h1>Carrera: {{ $career->name }}</h1>

        <a href="{{ route('careers.edit', $career) }}">Edit ></a>

        <form method="POST" action="{{ route('careers.destroy', $career) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete ></button>
        </form>

        <a href="{{ route('courses.create', $career) }}">Asignar Cursos ></a>

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
                    <td>Usuario</td>
                    <td>Rol</td>
                    <td>Acciones</td>
                </tr>

                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->lastname }}</td>
                        <td>{{ $teacher->user->name }}</td>
                        <td>{{ $teacher->user->name }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', $teacher) }}">Edit ></a>

                            <form method="POST" action="{{ route('teachers.destroy', $teacher) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete ></button>
                            </form>
                        </td>
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
                    <td>Usuario</td>
                    <td>Rol</td>
                    <td>Acciones</td>
                </tr>

                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}">Edit ></a>

                            <form method="POST" action="{{ route('students.destroy', $student) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete ></button>
                            </form>
                        </td>
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
                    <td>Acciones</td>
                </tr>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject) }}">Edit ></a>

                            <form method="POST" action="{{ route('subjects.destroy', $subject) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete ></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{ $subjects->links() }}
            </table>
        </div>

    </body>
</x-app-layout>
