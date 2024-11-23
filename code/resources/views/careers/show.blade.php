<x-template-layout>

    <div class="container">

        {{-- <h3>{{ $career->name }}</h3> --}}
        <x-icon-dropdown>
            <x-slot name="titulo">{{$career->name}}</x-slot>
            <x-slot name="url_editar">{{route('careers.edit', $career)}}</x-slot>
            <x-slot name="url_eliminar">{{route('careers.destroy', $career)}}</x-slot>
        </x-icon-dropdown>

        {{-- <div class="col-md-6 col-lg-8 mb-3">
            <x-card>
                <x-slot name="objeto">{{$subject->id}}</x-slot>
                <x-slot name="titulo"></x-slot>
                <x-slot name="img">
                    <img class="card-img-top" src="../template_files/assets/img/reyo/programacion-2-e1551291144973.jpg" alt="materia" />
                </x-slot>
                <x-slot name="texto">
                    <x-icon-dropdown>
                        <x-slot name="titulo">{{$subject->name}}</x-slot>
                        <x-slot name="url_editar">{{route('subjects.edit', $subject)}}</x-slot>
                        <x-slot name="url_eliminar">{{route('subjects.destroy', $subject)}}</x-slot>
                    </x-icon-dropdown>
                </x-slot>
                <x-slot name="footer"></x-slot>
            </x-card>
            
        </div>

        <div class="col-md-6 col-lg-8 mb-3">
            <x-card>
                <x-slot name="objeto">{{$subject->id}}</x-slot>
                <x-slot name="titulo">Nicolás Rotili</x-slot>
                <x-slot name="img"></x-slot>
                <x-slot name="texto">Buenas noches, para los que no acceden a promoción y vienen a rendir en instancia de regulares.  Para el día del examen deben venir a defender el trabajo, previamente corregido y mostrado su funcionamiento.
                    Alta, baja y modificación de profesores.
                    Alta, baja y modificación de alumnos.
                    Alta, baja y modificación de materias.
                    Dashboard de ingreso con información que consideren relevante (alumnos registrados, docentes registrados, materias registradas, etc)
                    Cada formulario, debe permitir generar las relaciones correspondientes, es decir que al dar de alta un profesor, me debe dejar asignarlo a una materia; cada alumno me debe permitir asignarlo a muchas materias, etc.
                    Pueden utilizar templates para el frontend.
                    + TEORÍA DE TODO EL AÑO.
                    Cualquier duda, consulten.</x-slot>
                <x-slot name="footer">
                    <div class="card-footer">Comentar...</div>
                </x-slot>
            </x-card> 
        </div> --}}

        <div class="col-md mb-4 mb-md-0">
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
                                    <th></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </x-slot>

                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">

                                @foreach ($career->courses as $course)
                                    <x-table-item>
                                        <x-slot name="fila_url">{{ route('courses.show', [$course->id]) }}</x-slot>
                                        <x-slot name="nombre">{{ $course->course_number }}</x-slot>
                                        <x-slot name="apellido">{{ $course->section }}</x-slot>  
                                        <x-slot name="usuario"></x-slot>
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
                                    $courses = $career->courses;
                                @endphp
            
                                @if ($courses->isNotEmpty())
                                    @foreach ($courses as $course)
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
                                    @endforeach
                                @endif
                            </tbody>
                        </x-slot>
                    </x-table>

                </x-slot>

            </x-acordion>

            <x-acordion>

                <x-slot name="numero">3</x-slot>
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
            
                                @foreach ($career->students as $student)
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

                <x-slot name="numero">4</x-slot>
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
            
                                @foreach ($career->subjects as $subject)
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
        <x-slot name="url">{{route('careers.create')}}</x-slot>
    </x-floating-icon>
    
</x-template-layout>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Carrera: {{$career->name}}</h1>
    <p>Institución "{{$career->institution->name}}"</p>
    <a href="{{route('careers.edit', $career)}}">Edit</a>

    <form method="POST" action="{{route('careers.destroy', $career)}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html> --}}