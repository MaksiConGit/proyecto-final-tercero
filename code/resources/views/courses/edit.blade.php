<x-template-layout>
    <x-slot name="titulo">Editar Estudiante</x-slot>
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
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('courses.index', [$course]) }}">Cursos /</a>
                <a href="{{ route('courses.show', [$course]) }}">Detalles /</a>
            </span> Editar
        </h4>
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar curso</x-slot>
            <x-slot name="action">{{route('courses.update', $course)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-select>
                    <x-slot name="titulo">Institución</x-slot>
                    <x-slot name="name">institution_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una institutión</option>
                        @foreach ($institutions as $institution)
                            <option {{ $institution->id == $course->institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Carrera</x-slot>
                    <x-slot name="name">career_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una carrera</option>
                        @foreach ($careers as $career)
                            <option {{ $career->id == $course->career->id ? 'selected' : '' }} value="{{$career->id}}">{{$career->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Año</x-slot>
                    <x-slot name="name">course_number</x-slot>
                    <x-slot name="placeholder">1</x-slot>
                    <x-slot name="value">{{ old('course_number', $course->course_number) }}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">División</x-slot>
                    <x-slot name="name">section</x-slot>
                    <x-slot name="placeholder">A</x-slot>
                    <x-slot name="value">{{ old('section', $course->section) }}</x-slot>
                </x-input-text>
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere editar esta carrera?</x-slot>
                    <x-slot name="contenido">Los datos se podrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{ route('courses.show', [$course]) }}</x-slot>
        </x-form-horizontal-icon>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>    
            @endforeach
        </ul>
        @endif
    </div>
</x-template-layout>
