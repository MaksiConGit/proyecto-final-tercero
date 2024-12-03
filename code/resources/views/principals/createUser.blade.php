<x-template-layout>
    <x-slot name="titulo">Directivos</x-slot>
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
                $institutions = collect();
            @endphp

            @if ($user->hasRole('Admin'))
                @php
                    $institutions = Institution::all();
                @endphp
            @elseif ($user->hasRole('Principal'))
                @php
                    $institutions = $user->accountable->institutionPrincipals->pluck('institution')->unique('id');
                @endphp
            @elseif ($user->hasRole('Teacher'))
                @php
                    $institutions = $user->accountable->courses->pluck('career.institution')->unique('id');
                @endphp
            @elseif ($user->hasRole('Student'))
                @php
                    $institutions = $user->accountable->courses->pluck('career.institution')->unique('id');
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
                    $careers = $user->accountable->courses->pluck('career')->unique('id');
                @endphp
            @elseif ($user->hasRole('Student'))
                @php
                    $careers = $user->accountable->courses->pluck('career')->unique('id');
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
        <li class="menu-item active">
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
    <style>
        .stretched-link {
            z-index: 1;
        }

        .internal-link {
            position: relative;
            z-index: 2;
        }

        .user-card img {
            object-fit: cover;
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .user-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .user-card:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            Creacion de usuario para {{$principal->name . " " .$principal->lastname}}
        </h4>
        <div class="">
            <x-form-horizontal-icon>
                <x-slot name="titulo">Ingrese su correo</x-slot>
                <x-slot name="action">{{ route('principals.storeUser', $principal) }}</x-slot>
                <x-slot name="method"></x-slot>
                <x-slot name="inputs">
                    <x-input-email>
                        <x-slot name="icon">bx bx-buildings</x-slot>
                        <x-slot name="titulo">Correo Electrónico</x-slot>
                        <x-slot name="name">email</x-slot>
                        <x-slot name="placeholder">ejemplo@ejemplo.com</x-slot>
                        <x-slot name="value">{{ old('email') }}</x-slot>
                    </x-input-email>
                </x-slot>
                <x-slot name="modal">
                    <x-modal_template>
                        <x-slot name="titulo">¿Estás seguro que el correo ingresado es el correcto?</x-slot>
                        <x-slot name="contenido"></x-slot>
                    </x-modal_template>
                </x-slot>
                <x-slot name="volver_url">{{route('principals.index')}}</x-slot>
            </x-form-horizontal-icon>

        </div>
    </div>
    <x-floating-icon>
        <x-slot name="url">{{ route('principals.create') }}</x-slot>
        <x-slot name="texto">Directivo +</x-slot>
    </x-floating-icon>
</x-template-layout>
