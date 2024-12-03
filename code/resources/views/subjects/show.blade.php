<x-template-layout>
    <x-slot name="titulo">Detalles de la Materia</x-slot>
    <x-slot name="li">
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
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
                $careers_aside = collect();
            @endphp

            @if ($user->hasRole('Admin'))
                @php
                    $careers_aside = Career::all();
                @endphp

            @elseif ($user->hasRole('Principal'))
                @foreach ($user->accountable->institutionPrincipals as $institutionPrincipal)
                    @php
                        $careers_aside = $careers_aside->merge($institutionPrincipal->institution->careers);
                    @endphp
                @endforeach

            @elseif ($user->hasRole('Teacher'))
                @php
                    $careers_aside = $user->accountable->courses
                                ->pluck('career')
                                ->unique('id');
                @endphp

            @elseif ($user->hasRole('Student'))
                @php
                    $careers_aside = $user->accountable->courses
                                ->pluck('career')
                                ->unique('id');
                @endphp

            @else
                <p>No tienes acceso a esta sección.</p>
            @endif

            @if ($careers_aside->isNotEmpty())
                <ul class="menu-sub">
                    @foreach ($careers_aside as $career)
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
        <li class="menu-item active">
            <a href="{{ route('subjects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Basic">Materias</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('grades.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-pencil"></i>
                <div data-i18n="Basic">Notas</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('attendance_records.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-circle"></i>
                <div data-i18n="Basic">Asistencias</div>
            </a>
        </li>
        <li class="menu-item">
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
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('subjects.index', [$subject]) }}">Materias /</a>
            </span> Detalles
        </h4>
        <x-icon-dropdown>
            <x-slot name="titulo">{{ $subject->name }}</x-slot>
            <x-slot name="subtitulo">
                @foreach ($subject->courseSubjects as $courseSubject)
                    <p class="mb-4" style="white-space: nowrap;">{{ $courseSubject->course->career->institution->name }}</p>
                @endforeach     
            </x-slot>
            <x-slot name="url_editar">{{ route('subjects.edit', $subject) }}</x-slot>
            <x-slot name="url_eliminar">{{ route('subjects.destroy', $subject) }}</x-slot>
        </x-icon-dropdown>
        
        @if ($subject->teacherSubject->isNotEmpty())
        <x-table>

            <x-slot name="titulo_tabla">Profesores</x-slot>

            <x-slot name="table_head">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th></th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
            </x-slot>

            <x-slot name="table_body">
                <tbody class="table-borde-bottom-0">

                    @foreach ($subject->teacherSubject as $teacherSubject)

                        <x-table-item>
                            <x-slot name="fila_url">{{route('teachers.show', [$teacherSubject->teacher])}}</x-slot>
                            <x-slot name="nombre">{{$teacherSubject->teacher->name}}</x-slot>
                            <x-slot name="apellido">{{$teacherSubject->teacher->lastname}}</x-slot>
                            <x-slot name="nombre_usuario">{{$teacherSubject->teacher->user->name}}</x-slot>
                            <x-slot name="usuario">
                                <x-td-user>
                                    <x-slot name="nombre_usuario">{{ $teacherSubject->teacher->user->name }}</x-slot>
                                    <x-slot name="usuario_url">{{ route('users.edit', [$teacherSubject->teacher->user->id]) }}</x-slot>
                                </x-td-user>
                            </x-slot>
                            <x-slot name="rol">
                                @if ($teacherSubject->teacher->user)
                                @php
                                    $roles = $teacherSubject->teacher->user->getRoleNames();
                                @endphp
                            
                                @if ($roles->isNotEmpty())
                                    {{$roles->first()}}
                                @else
                                    Rol no asignado
                                @endif
                            @else 
                                Rol no asignado
                            @endif
                            
                            </x-slot>
                            <x-slot name="editar_url">{{route('teachers.edit', [$teacherSubject->teacher])}}</x-slot>
                        </x-table-item>

                    @endforeach

                </tbody>
            </x-slot>

        </x-table>
        @else
            No tiene profesor asignado.
        @endif
        

    </div>
    @can('subjects.create')
    <x-floating-icon>
        <x-slot name="url">{{ route('subjects.create') }}</x-slot>
        <x-slot name="texto">Materia +</x-slot>
    </x-floating-icon>
    @endcan
</x-template-layout>

