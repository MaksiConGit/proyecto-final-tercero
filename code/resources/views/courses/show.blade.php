{{-- <x-template-layout>
    <div class="card mx-4 p-4">
    <h1>Curso: {{$course->course_number . "° " . $course->section}}</h1>
    <p>Carrera "{{$course->course->name}}"</p>

    <form method="POST" action="{{route('courses.destroy', $course)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Delete</button>
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{route('courses.index')}}" class="btn btn-secondary">Volver</a>
        <br>
        <br>
        <p>Alumnos: <a href="">Joaquin, Lucas, David, Maximiliano, Estefi</a></p>
    </form>
</div>
</x-template-layout> --}}

<x-template-layout>

    <div class="container">

        <x-icon-dropdown>
            <x-slot name="titulo">{{$course->course_number}}°{{$course->section}}</x-slot>
            <x-slot name="subtitulo"><p class="mb-4" style="white-space: nowrap;">{{$course->career->name}}</p></x-slot>
            <x-slot name="url_editar">{{route('courses.edit', $course)}}</x-slot>
            <x-slot name="url_eliminar">{{route('courses.destroy', $course)}}</x-slot>
        </x-icon-dropdown>

        <div class="col-md mb-4 mb-md-0">
            <x-acordion>
                <x-slot name="numero">1</x-slot>
                <x-slot name="titulo">Profesores</x-slot>
                <x-slot name="body">

                    <x-table>
                        <x-slot name="titulo_tabla">Profesores</x-slot>
            
                        <x-slot name="table_head">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </x-slot>
            
                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">

                                @php
                                    $courseTeachers = $course->courseTeachers;
                                @endphp

                                @if ($courseTeachers->isNotEmpty())
                                    @foreach ($courseTeachers as $courseTeacher)
                                        @php
                                            $teacher = $courseTeacher->teacher;
                                        @endphp

                                        @if ($teacher)
                                            <x-table-item>
                                                <x-slot name="fila_url">{{ route('teachers.show', [$teacher->id]) }}</x-slot>
                                                <x-slot name="nombre">{{ $teacher->name }}</x-slot>
                                                <x-slot name="apellido">{{ $teacher->lastname }}</x-slot>
                                                <x-slot name="usuario">
                                                    <x-td-user>
                                                        <x-slot name="nombre_usuario">{{ $teacher->user->name }}</x-slot>
                                                        <x-slot name="usuario_url">{{ route('users.edit', [$teacher->user->id]) }}</x-slot>
                                                    </x-td-user>
                                                </x-slot>
                                                <x-slot name="rol">{{ $teacher->user->role->name }}</x-slot>
                                                <x-slot name="editar_url">{{ route('teachers.edit', [$teacher->id]) }}</x-slot>
                                            </x-table-item>
                                        @endif
                                    @endforeach
                                @endif

                            </tbody>
                        </x-slot>
                    </x-table>

                </x-slot>

            </x-acordion>

            <x-acordion>

                <x-slot name="numero">2</x-slot>
                <x-slot name="titulo">Estudiantes</x-slot>
                <x-slot name="body">

                    <x-table>
                        <x-slot name="titulo_tabla">Estudiantes</x-slot>
            
                        <x-slot name="table_head">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </x-slot>
            
                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">
            
                                @foreach ($course->students as $student)
                                    <x-table-item>
                                        <x-slot name="fila_url">{{ route('teachers.show', [$student->id]) }}</x-slot>
                                        <x-slot name="nombre">{{ $student->name }}</x-slot>
                                        <x-slot name="apellido">{{ $student->lastname }}</x-slot>
                                        <x-slot name="usuario">
                                            <x-td-user>
                                                <x-slot name="nombre_usuario">{{ $student->user->name }}</x-slot>
                                                <x-slot name="usuario_url">{{ route('users.edit', [$student->user->id]) }}</x-slot>
                                            </x-td-user>
                                        </x-slot>
                                        <x-slot name="rol">{{ $student->user->role->name }}</x-slot>
                                        <x-slot name="editar_url">{{ route('teachers.edit', [$student->id]) }}</x-slot>
                                    </x-table-item>
                                @endforeach
                            </tbody>
                        </x-slot>
                    </x-table>
                    
                </x-slot>

            </x-acordion>
            <x-acordion>

                <x-slot name="numero">3</x-slot>
                <x-slot name="titulo">Materias</x-slot>
                <x-slot name="body">

                    <x-table>
                        <x-slot name="titulo_tabla">Materias</x-slot>
            
                        <x-slot name="table_head">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    {{-- <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Rol</th> --}}
                                    <th></th>
                                    <th></th>
                                    <th>Acciones</th> 
                                </tr>
                            </thead>
                        </x-slot>
            
                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">
                                @foreach ($course->subjects as $subject)
                                    <x-table-item>
                                        <x-slot name="fila_url">{{ route('subjects.show', [$subject->id]) }}</x-slot>
                                        <x-slot name="nombre">{{ $subject->name }}</x-slot>
                                        <x-slot name="apellido"></x-slot>
                                        <x-slot name="usuario"></x-slot>
                                        <x-slot name="rol"></x-slot>
                                        <x-slot name="editar_url">{{ route('subjects.edit', [$subject->id]) }}</x-slot>
                                    </x-table-item>
                                @endforeach
                            </tbody>
                        </x-slot>
                    </x-table>

                </x-slot>

            </x-acordion>
        </div>

    </div>

    <x-floating-icon>
        <x-slot name="url">{{route('courses.create')}}</x-slot>
    </x-floating-icon>
    
</x-template-layout>
