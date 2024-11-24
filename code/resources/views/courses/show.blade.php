<x-app-layout>

    <body>
        <h1>Curso: {{ $course->course_number . '° ' . $course->section }}</h1>
        <a href="{{ route('courses.edit', $course) }}"><strong>Edit ></strong></a>

        <form method="POST" action="{{ route('courses.destroy', $course) }}">
            @csrf
            @method('DELETE')
            <button type="submit"><strong>Delete ></strong></button>
        </form>
        <hr>
        <h2>Alumnos</h2>
        <a href="{{ route('students.create') }}"><strong>Agregar Alumno ></strong></a>
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Usuario</td>
                    <td>Acciones</td>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->user->email }}</td>
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
            </table>
        </div>
        <hr>
        <h2>Profesores</h2>
        <a href="{{ route('teachers.create') }}"><strong>Agregar Profesor ></strong></a>

        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Usuario</td>
                    <td>Acciones</td>
                </tr>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->lastname }}</td>
                        <td>{{ $teacher->user->email }}</td>
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
        </div>

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
            </table>
        </div>
    </body>
</x-app-layout>
