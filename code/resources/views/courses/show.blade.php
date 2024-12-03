<x-template-layout>
    <x-slot name="titulo">Detalles del Estudiante</x-slot>
    <x-slot name="li">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Layouts">Instituciones</div>
            </a>
        
            @php
                $user = auth()->user();
                $institutions = collect(); // Inicializamos una colección vacía para instituciones
            @endphp
        
            @if ($user->hasRole('Admin'))
                @php
                    $institutions = \App\Models\Institution::all(); // Todas las instituciones
                @endphp
        
            @elseif ($user->hasRole('Principal'))
                @php
                    $institutions = $user->accountable->institutionPrincipals
                                    ->pluck('institution')
                                    ->unique('id');
                @endphp
        
            @elseif ($user->hasRole('Teacher'))
                @php
                    $institutions = $user->accountable->courses
                                    ->pluck('career.institution')
                                    ->unique('id');
                @endphp
        
            @elseif ($user->hasRole('Student'))
                @php
                    $institutions = $user->accountable->courses
                                    ->pluck('career.institution')
                                    ->unique('id');
                @endphp
        
            @else
                <p>No tienes acceso a esta sección.</p>
            @endif
        
            <!-- Mostrar instituciones únicas -->
            @if ($institutions->isNotEmpty())
                <ul class="menu-sub">
                    @foreach ($institutions as $institution)
                        <li class="menu-item">
                            <a href="{{ route('institutions.show', [$institution]) }}" class="menu-link">
                                <div data-i18n="Without menu">{{ $institution->name }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
        

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Layouts">Carreras</div>
            </a>

            @php
                $user = auth()->user();
                $careers = collect();
            @endphp

            @if ($user->hasRole('Admin'))
                @php
                    $careers = Career::all();
                @endphp

            @elseif ($user->hasRole('Principal'))
                @foreach ($user->accountable->institutionPrincipals as $institutionPrincipal)
                    @php
                        $careers = $careers->merge($institutionPrincipal->institution->careers);
                    @endphp
                @endforeach

            @elseif ($user->hasRole('Teacher'))
                @php
                    $careers = $user->accountable->courses
                                ->pluck('career')
                                ->unique('id');
                @endphp

            @elseif ($user->hasRole('Student'))
                @php
                    $careers = $user->accountable->courses
                                ->pluck('career')
                                ->unique('id');
                @endphp

            @else
                <p>No tienes acceso a esta sección.</p>
            @endif

            @if ($careers->isNotEmpty())
                <ul class="menu-sub">
                    @foreach ($careers as $career)
                        <li class="menu-item">
                            <a href="{{ route('careers.show', [$career]) }}" class="menu-link">
                                <div data-i18n="Without menu">{{ $career->name }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Utilidades</span></li>
    
        <li class="menu-item">
            <a href="{{ route('timetables.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Basic">Horarios</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('subjects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Basic">Materias</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('attendance_records.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-circle"></i>
                <div data-i18n="Basic">Asistencias</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{ route('courses.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Basic">Cursos</div>
            </a>
        </li>
    
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Personas</span></li>
    
        <li class="menu-item">
            <a href="{{ route('students.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Estudiantes</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('teachers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div data-i18n="Basic">Profesores</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('principals.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Basic">Directivos</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Basic">Usuarios</div>
            </a>
        </li>

    </x-slot>

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
                                                <x-slot name="rol">
                                                    @if ($teacher->user)
                                                        {{$teacher->user->getRoleNames()->first()}}
                                                    @else 
                                                        Rol no asignado.
                                                    @endif
                                                </x-slot>
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
                                                <x-slot name="nombre_usuario">
                                                    @if ($student->user)
                                                    {{ $student->user->name }}
                                                    @endif
                                                </x-slot>
                                                <x-slot name="usuario_url">
                                                    @if ($student->user)
                                                    {{ route('users.edit', [$student->user->id]) }}
                                                    @endif
                                                </x-slot>
                                            </x-td-user>
                                        </x-slot>
                                        <x-slot name="rol">
                                            @if ($student->user)
                                                {{$student->user->getRoleNames()->first()}}
                                            @else 
                                                Rol no asignado.
                                            @endif
                                        </x-slot>
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

    @can('courses.create')
    <x-floating-icon>
        <x-slot name="url">{{ route('courses.create') }}</x-slot>
        <x-slot name="texto">Curso +</x-slot>
    </x-floating-icon>
    @endcan
    
</x-template-layout>
