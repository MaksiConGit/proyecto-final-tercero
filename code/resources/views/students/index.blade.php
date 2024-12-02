<x-template-layout>
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

