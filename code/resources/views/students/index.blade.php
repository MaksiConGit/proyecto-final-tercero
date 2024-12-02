<x-template-layout>
    <x-slot name="titulo">Estudiantes</x-slot>
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
            {{-- <span class="text-muted fw-light">Estudiantes /</span> Editar Examen --}}
            Estudiantes
        </h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">        
            @foreach ($students as $student)
            <div class="col">
                <div class="card user-card position-relative">
                    <!-- Enlace estirado -->
                    <a href="{{ route('students.show', [$student->id]) }}" class="stretched-link" style="pointer-events: auto;"></a>
                    <div class="d-flex align-items-center p-3">
                        <img src="../../template_files/assets/img/elements/12.jpg" alt="User image">
                        <div class="ms-3">
                            <h5 class="card-title mb-1">{{ $student->name }}, {{$student->lastname}}</h5>
                            @if ($student->user)
                            <!-- Enlace interno con estilo para alineación -->
                            <a href="{{ route('users.show', [$student->user]) }}" 
                               class="btn btn-link internal-link d-inline-block" 
                               style="pointer-events: auto; position: relative; padding: 0;">
                                {{$student->user->name}}
                            </a>
                            @else
                                <a href="{{ route('users.create') }}" 
                                class="btn btn-link internal-link d-inline-block text-decoration-none" 
                                style="pointer-events: auto; position: relative; padding: 0;">
                                    Crear usuario
                                </a>
                            @endif
                            <p class="card-text mb-0">
                                @if ($student->user)
                                    <span class="badge me-1
                                    @if($student->user->getRoleNames()->first() == 'Admin') bg-label-danger 
                                    @elseif($student->user->getRoleNames()->first() == 'Principal') bg-label-primary 
                                    @elseif($student->user->getRoleNames()->first() == 'Teacher') bg-label-warning 
                                    @elseif($student->user->getRoleNames()->first() == 'Student') bg-label-info 
                                    @else bg-label-secondary
                                    @endif">
                                    {{$student->user->getRoleNames()->first()}}</span>
                                @else 
                                    Usuario no asignado.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>

    </div>
    <x-floating-icon>
        <x-slot name="url">{{ route('students.create') }}</x-slot>
    </x-floating-icon>
</x-template-layout>

