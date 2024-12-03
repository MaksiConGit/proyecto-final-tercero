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
            Hola, {{ $teacher->name . ' ' . $teacher->lastname }}
        </h4>

        <x-acordion>
            <x-slot name="numero">1</x-slot>
            <x-slot name="titulo">Promedio de Asistencias por Curso</x-slot>
            <x-slot name="body">


                @if ($coursesWithAttendance->isEmpty())
                    <p>No hay cursos asignados.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Carrera</th>
                                <th>Curso</th>
                                <th>Promedio de Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coursesWithAttendance as $data)
                                <tr>
                                    <td>{{ $data['course']->career->name }} </td>
                                    <td>{{ $data['course']->course_number . '° ' . $data['course']->section }} </td>
                                    <td>{{ $data['attendance_percentage'] }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </x-slot>

        </x-acordion>

        <x-acordion>
            <x-slot name="numero">2</x-slot>
            <x-slot name="titulo">Próximos Exámenes</x-slot>
            <x-slot name="body">

                @if ($nextExams->isEmpty())
                    <p>No hay próximos exámenes programados.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>N° de Examen</th>
                                <th>Materia</th>
                                <th>Curso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nextExams as $exam)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($exam->date)->format('d/m/Y') }}</td>
                                    <td>Examen #{{ $exam->number }}</td>
                                    <td>{{ $exam->teacherSubject->subject->name }}</td>
                                    <td>
                                        @foreach ($exam->courses as $course)
                                            {{ $course->course_number . '° ' . $course->section . ' ' }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif


            </x-slot>

        </x-acordion>

        <x-acordion>
            <x-slot name="numero">3</x-slot>
            <x-slot name="titulo">Cantidad de Exámenes Tomados</x-slot>
            <x-slot name="body">

                @if ($subjectsWithExamCount->isEmpty())
                    <p>No hay exámenes tomados</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Exámenes Tomados</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjectsWithExamCount as $data)
                                <tr>
                                    <td>{{ $data['subject']->name }}</td>
                                    <td>
                                        @if ($data['exam_count'] > 0)
                                            {{ $data['exam_count'] }}
                                        @else
                                            No se han tomado exámenes en esta materia.
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </x-slot>

        </x-acordion>


</x-template-layout>
