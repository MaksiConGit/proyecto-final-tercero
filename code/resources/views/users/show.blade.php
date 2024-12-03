<x-template-layout>
    <x-slot name="titulo">Detalles del Usuario</x-slot>
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
            $user_aside = auth()->user();
            $institutions = collect(); // Inicializamos una colección vacía para instituciones
        @endphp
    
        @if ($user_aside->hasRole('Admin'))
            @php
                $institutions = \App\Models\Institution::all(); // Todas las instituciones
            @endphp
    
        @elseif ($user_aside->hasRole('Principal'))
            @php
                $institutions = $user_aside->accountable->institutionPrincipals
                                ->pluck('institution')
                                ->unique('id');
            @endphp
    
        @elseif ($user_aside->hasRole('Teacher'))
            @php
                $institutions = $user_aside->accountable->courses
                                ->pluck('career.institution')
                                ->unique('id');
            @endphp
    
        @elseif ($user_aside->hasRole('Student'))
            @php
                $institutions = $user_aside->accountable->courses
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
            $user_aside = auth()->user();
            $careers_aside = collect();
        @endphp

        @if ($user_aside->hasRole('Admin'))
            @php
                $careers_aside = Career::all();
            @endphp

        @elseif ($user_aside->hasRole('Principal'))
            @foreach ($user_aside->accountable->institutionPrincipals as $institutionPrincipal)
                @php
                    $careers_aside = $careers_aside->merge($institutionPrincipal->institution->careers);
                @endphp
            @endforeach

        @elseif ($user_aside->hasRole('Teacher'))
            @php
                $careers_aside = $user_aside->accountable->courses
                            ->pluck('career')
                            ->unique('id');
            @endphp

        @elseif ($user_aside->hasRole('Student'))
            @php
                $careers_aside = $user_aside->accountable->courses
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
    <li class="menu-item">
        <a href="{{ route('courses.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book-reader"></i>
            <div data-i18n="Basic">Cursos</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase"><span class="menu-header-text">Personas</span></li>

    <li class="menu-item">
        <a href="{{ route('students.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user_aside"></i>
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
            <i class="menu-icon tf-icons bx bx-user_aside-circle"></i>
            <div data-i18n="Basic">Directivos</div>
        </a>
    </li>
    <li class="menu-item active">
        <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Basic">Usuarios</div>
        </a>
    </li>

</x-slot>

    <div class="container-xxl flex-grow-1 container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('users.index', [$user]) }}">Usuarios /</a>
            </span> Detalles
        </h4>

        <div class="row">
            <div class="col-md-12">
                <!-- Información del Usuario -->
                <div class="card mb-4">
                    <h5 class="card-header">Información del Usuario</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="../../template_files/assets/img/avatars/1.png"
                                alt="Avatar del usuario"
                                class="d-block rounded-circle"
                                height="100"
                                width="100"
                            />
                            <div>
                                <h4>{{$user->name}}</h4>
                                <p class="text-muted mb-0">{{$user->email}}</p>
                                <span class="badge bg-primary mt-2">Usuario Activo</span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Rol</label>
                                <br>
                                <p class="card-text mb-0">
                                    @if ($user->getRoleNames()->isNotEmpty())
                                        <span class="badge me-1
                                        @if($user->getRoleNames()->first() == 'Admin') bg-label-danger 
                                        @elseif($user->getRoleNames()->first() == 'Principal') bg-label-primary 
                                        @elseif($user->getRoleNames()->first() == 'Teacher') bg-label-warning 
                                        @elseif($user->getRoleNames()->first() == 'Student') bg-label-info 
                                        @else bg-label-secondary
                                        @endif">
                                        {{$user->getRoleNames()->first()}}</span>
                                    @else 
                                        <span class="badge me-1 bg-label-secondary">Rol no asignado</span>
                                    @endif
                                </p>    
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Estado</label>
                                <p class="form-control-plaintext text-dark">Activo</p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Nombre Completo</label>
                                <p class="form-control-plaintext text-dark">

                                    @if ($user->getRoleNames()->isNotEmpty())
                                        
                                        @if($user->getRoleNames()->first() == 'Principal')
                                            <a href="{{ route('principals.show', [$user->accountable]) }}">{{$user->accountable->name}}, {{$user->accountable->lastname}}</a>
                                        @elseif($user->getRoleNames()->first() == 'Teacher')
                                            <a href="{{ route('teachers.show', [$user->accountable]) }}">{{$user->accountable->name}}, {{$user->accountable->lastname}}</a>
                                        @elseif($user->getRoleNames()->first() == 'Student')
                                            <a href="{{ route('students.show', [$user->accountable]) }}">{{$user->accountable->name}}, {{$user->accountable->lastname}}</a>
                                        @else
                                        
                                            Persona no asignada

                                        @endif

                                    @endif

                                    
                                    @if ($user->teacher)
                                        <a href="{{ route('teachers.show', [$user->teacher]) }}">{{$user->teacher->name}}, {{$user->teacher->lastname}}</a>
                                    @elseif ($user->student)
                                        <a href="{{ route('students.show', [$user->student]) }}">{{$user->student->name}}, {{$user->student->lastname}}</a>
                                    @elseif ($user->principal)
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Fecha de Registro</label>
                                <p class="form-control-plaintext text-dark">{{$user->created_at}}</p>
                            </div>
                        </div>
                        <div class="mt-2 d-flex gap-3">
                            <form method="POST" action="{{ route('users.destroy', [$user]) }}" class="m-0">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('users.edit', [$user]) }}" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalToggle">Eliminar</a>
                                <x-modal_template_delete>
                                    <x-slot name="titulo">¿Estás seguro que quiere ELIMINAR este usuario?</x-slot>
                                    <x-slot name="contenido">Los datos NO podrán modificar más adelante.</x-slot>
                                </x-modal_template_delete>
                            </form>
                            {{-- <a href="{{ route('users.index', [$user]) }}" class="btn btn-secondary">Volver</a> --}}
                        </div>
                    </div>
                </div>

                <!-- Actividades Recientes -->
                <div class="card">
                    <h5 class="card-header">Actividades Recientes</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Inicio de sesión exitoso</strong>
                                <span class="text-muted">01/12/2023 10:00 AM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Actualización de contraseña</strong>
                                <span class="text-muted">30/11/2023 04:30 PM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Cambio de correo electrónico</strong>
                                <span class="text-muted">28/11/2023 01:15 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template-layout>
