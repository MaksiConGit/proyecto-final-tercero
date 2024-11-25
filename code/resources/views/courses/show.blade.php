<x-app-layout>

    <body>
        <h1>Curso: {{ $course->course_number . '° ' . $course->section }}</h1>
        @can('courses.edit')
            <a href="{{ route('courses.edit', $course) }}"><strong>Edit ></strong></a>
        @endcan

        @can('courses.destroy')
            <form method="POST" action="{{ route('courses.destroy', $course) }}">
                @csrf
                @method('DELETE')
                <button type="submit"><strong>Delete ></strong></button>
            </form>
        @endcan

        <hr>
        <h2><strong>Alumnos</strong></h2>
        @can('students.assignCourse')
            <a href="{{ route('students.assignCourse', $course) }}"><strong>Asignar Alumno ></strong></a>
        @endcan
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>

                    @can('see.info')
                        <td>Usuario</td>
                        <td>Acciones</td>
                    @endcan

                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        @can('see.info')
                        <td>{{ $student->user->email }}</td>
                        <td>
                            @can('students.edit')
                                <a href="{{ route('students.edit', $student) }}">Edit ></a>
                            @endcan
                            @can('students.destroy')
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
            </table>
        </div>
        <hr>
        <h2><strong>Profesores</strong></h2>
        @can('teachers.create')
            <a href="{{ route('teachers.create') }}"><strong>Agregar Profesor ></strong></a>
        @endcan

        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>

                    @can('see.info')
                        <td>Usuario</td>
                        <td>Acciones</td>
                    @endcan
                </tr>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->lastname }}</td>
                        @can('see.info')
                            <td>{{ $teacher->user->email }}</td>
                            <td>
                                @can('teachers.edit')
                                    <a href="{{ route('teachers.edit', $teacher) }}">Edit ></a>
                                @endcan

                                @can('teachers.destory')
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
        </div>
        <hr>
        <h2><strong>Materias</strong></h2>
        <div>
            <table>
                <tr>
                    <td>Nombre</td>
                    @can('see.info')
                        <td>Acciones</td>
                    @endcan
                </tr>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
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
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</x-app-layout>
