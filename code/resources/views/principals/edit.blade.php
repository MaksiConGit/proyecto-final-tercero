<x-template-layout>
    <x-slot name="titulo">Editar Profesor</x-slot>
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
                $institutions_aside = collect(); // Inicializamos una colección vacía para instituciones
            @endphp

            @if ($user->hasRole('Admin'))
                @php
                    $institutions_aside = \App\Models\Institution::all(); // Todas las instituciones
                @endphp
            @elseif ($user->hasRole('Principal'))
                @php
                    $institutions_aside = $user->accountable->institutionPrincipals->pluck('institution')->unique('id');
                @endphp
            @elseif ($user->hasRole('Teacher'))
                @php
                    $institutions_aside = $user->accountable->courses->pluck('career.institution')->unique('id');
                @endphp
            @elseif ($user->hasRole('Student'))
                @php
                    $institutions_aside = $user->accountable->courses->pluck('career.institution')->unique('id');
                @endphp
            @else
                <p>No tienes acceso a esta sección.</p>
            @endif

            <!-- Mostrar instituciones únicas -->
            @if ($institutions_aside->isNotEmpty())
                <ul class="menu-sub">
                    @foreach ($institutions_aside as $institution)
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
                    $careers_aside = $user->accountable->courses->pluck('career')->unique('id');
                @endphp
            @elseif ($user->hasRole('Student'))
                @php
                    $careers_aside = $user->accountable->courses->pluck('career')->unique('id');
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
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Estudiantes</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('principals.index') }}" class="menu-link">
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
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('principals.index', [$principal]) }}">Directivos /</a>
                <a href="{{ route('principals.show', [$principal]) }}">Detalles /</a>
            </span> Editar
        </h4>
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar direcitvo</x-slot>
            <x-slot name="action">{{ route('principals.update', $principal) }}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Nombre</x-slot>
                    <x-slot name="name">name</x-slot>
                    <x-slot name="placeholder">Nombre</x-slot>
                    <x-slot name="value">{{ old('name', $principal->name) }}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Apellido</x-slot>
                    <x-slot name="name">lastname</x-slot>
                    <x-slot name="placeholder">Apellido</x-slot>
                    <x-slot name="value">{{ old('lastname', $principal->lastname) }}</x-slot>
                </x-input-text>
                <x-input-email>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Correo Electrónico</x-slot>
                    <x-slot name="name">email</x-slot>
                    <x-slot name="placeholder">ejemplo@ejemplo.com</x-slot>
                    <x-slot name="value">{{ old('email', $principal->user->email ?? '') }}</x-slot>
                </x-input-email>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">DNI</x-slot>
                    <x-slot name="name">dni</x-slot>
                    <x-slot name="placeholder">DNI</x-slot>
                    <x-slot name="value">{{ old('dni', $principal->dni) }}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Teléfono</x-slot>
                    <x-slot name="name">phone</x-slot>
                    <x-slot name="placeholder">Teléfono</x-slot>
                    <x-slot name="value">{{ old('phone', $principal->phone) }}</x-slot>
                </x-input-text>
                <x-input-date>
                    <x-slot name="titulo">Fecha de nacimiento</x-slot>
                    <x-slot name="name">birthdate</x-slot>
                    <x-slot name="value">{{ old('birthdate', $principal->birthdate) }}</x-slot>
                </x-input-date>

                @livewire('CitySelect', ['selectedCity' => $principal->city_id])

                <hr>
                <h5>Asignar Instituciones</h5>


                @foreach ($institutionsArray as $institution)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="instituciones[]"
                            value="{{ $institution->id }}" @if ($principal->institutions->contains($institution->id)) checked @endif>
                        <label class="form-check-label" for="instituciones[]">
                            {{ $institution->name }}
                        </label>
                    </div>
                @endforeach



            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere editar esta estudiante?</x-slot>
                    <x-slot name="contenido">Los datos se podrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{ route('principals.index') }}</x-slot>
        </x-form-horizontal-icon>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            </ul>
        @endif
    </div>

</x-template-layout>
