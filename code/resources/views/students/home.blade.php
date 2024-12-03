<x-template-layout>
    <x-slot name="titulo">Home - Estudiantes</x-slot>
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

        <li class="menu-item active">
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
            Hola, {{ $student->name . ' ' . $student->lastname }}
        </h4>

        @php
            $bgColor = 'bg-primary'; // Valor por defecto

            if ($averageGrade == 0) {
                $bgColor = 'bg-secondary';
            } elseif ($averageGrade < 5) {
                $bgColor = 'bg-danger';
            } elseif ($averageGrade >= 5 && $averageGrade < 7) {
                $bgColor = 'bg-warning';
            }
        @endphp

        <div class="card {{ $bgColor }} text-white">
            <div class="card-body">
                <h5 class="card-title text-white">Promedio de Calificaciones</h5>
                <p class="card-text">
                    @if ($averageGrade)
                        {{ number_format($averageGrade, 2) }}
                    @else
                        No tiene exámenes registrados
                    @endif
                </p>
            </div>
        </div>

        <div class="card mb-6">
            <div class="card-body">
                <h5 class="card-title mb-1">Última Calificacion</h5>
                @if ($lastExam)
                    <p class="text-primary">Nota: {{ $lastExam->grade }} </p>
                    <p class="card-text">
                        Examen Nº {{ $lastExam->exam->number }} de
                        {{ $lastExam->exam->teacherSubject->subject->name }}
                    </p>
                @else
                    <p>No ha tomado exámenes aún</p>
                @endif
            </div>
        </div>

        <div class="container">
            <x-card-attendance>
                <x-slot name="titulo">Promedio de Asistencia</x-slot>
                <x-slot name="url">{{ route('students.show', [$student->id]) }}</x-slot>
                <x-slot name="id">{{ $student->id }}</x-slot>
                <x-slot name="porcentaje_asistencia">{{ $attendanceAverage }}</x-slot>
                <x-slot name="porcentaje_inasistencia">{{ $absenceAverage }}</x-slot>
            </x-card-attendance>

            <div class="card">
                <div class="card-header">
                    Próximo examen:
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $nextExam ? 'Exámen N°' . $nextExam->number . ' de ' . $nextExam->teacherSubject->subject->name . '. Fecha: ' . $nextExam->date : 'No tienes próximos examenes' }}
                    </h5>
                    <p class="card-text">
                        {{$nextExam ? 'Profesor: ' . $nextExam->teacherSubject->teacher->name : '-'}}
                    </p>
                    <a href="javascript:void(0)" class="btn btn-primary">Ver Calendario</a>
                </div>
            </div>
        </div>
    </div>

    <x-floating-icon>
        <x-slot name="url">{{ route('students.create') }}</x-slot>
    </x-floating-icon>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const primaryColor = '#666ee8';
            const lightGreyColor = '#D3D3D3';
            const orangeLightColor = '#FDAC34';


            const ctx{{ $student->id }} = document.getElementById('doughnutChart{{ $student->id }}').getContext(
                '2d');
            const doughnutChart{{ $student->id }} = new Chart(ctx{{ $student->id }}, {
                type: 'doughnut',
                data: {
                    labels: ['Asistencia', 'Inasistencia'],
                    datasets: [{
                        data: [{{ $attendanceAverage }}, {{ $absenceAverage }}],
                        backgroundColor: [primaryColor, lightGreyColor],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '68%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ' : ' + context.raw + ' %';
                                }
                            },
                            backgroundColor: '#FFF',
                            titleColor: '#333',
                            bodyColor: '#666',
                            borderWidth: 1,
                            borderColor: '#DDD'
                        }
                    }
                }
            });

        });
    </script>
</x-template-layout>
