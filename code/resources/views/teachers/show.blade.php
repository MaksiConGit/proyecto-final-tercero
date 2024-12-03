<x-template-layout>
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
      <li class="menu-item active">
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
    <x-slot name="titulo">Detalles del Profesor</x-slot>
    <div class="container-xxl flex-grow-1 container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('teachers.index', [$teacher]) }}">Profesores /</a></span> Detalles
        </h4>
  
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Información del Profesor</h5>
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
                                <h4>{{$teacher->name}}, {{$teacher->lastname}}</h4>
                                <p class="text-muted mb-0">{{$teacher->email}}</p>
                                @foreach ($teacher->courses as $course)
                                <a href="{{ route('courses.show', [$course]) }}"><span class="badge bg-primary mt-2">{{$course->course_number}}°{{$course->section}}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">Usuario</label>
                            <p class="form-control-plaintext text-dark">
                              @if ($teacher->user)
                                <a href="{{ route('users.show', [$teacher->user]) }}">{{$teacher->user->name}}</a>
                              @else
                                <a href="{{ route('users.create') }}">Crear usuario</a>
                              @endif
                            </p>
                          </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Rol</label>
                                <br>
                                <p class="card-text mb-0">
                                    @if ($teacher->user->getRoleNames()->isNotEmpty())
                                    <span class="badge me-1
                                    @if($teacher->user->getRoleNames()->first() == 'Admin') bg-label-danger 
                                    @elseif($teacher->user->getRoleNames()->first() == 'Principal') bg-label-primary 
                                    @elseif($teacher->user->getRoleNames()->first() == 'Teacher') bg-label-warning 
                                    @elseif($teacher->user->getRoleNames()->first() == 'Student') bg-label-info 
                                    @else bg-label-secondary
                                    @endif">
                                    {{$teacher->user->getRoleNames()->first()}}</span>
                                    @else 
                                    <span class="badge me-1 bg-label-secondary">Rol no asignado</span>
                                    @endif
  
                              </p>
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">DNI</label>
                              <p class="form-control-plaintext text-dark">{{$teacher->dni}}</p>
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">Teléfono</label>
                              <p class="form-control-plaintext text-dark">{{$teacher->phone}}</p>
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">Fecha de nacimiento</label>
                              <p class="form-control-plaintext text-dark">{{$teacher->birthdate}}</p>
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">Ciudad</label>
                              <p class="form-control-plaintext text-dark">{{$teacher->city->name}}</p>
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">Fecha de Registro</label>
                              <p class="form-control-plaintext text-dark">{{$teacher->created_at}}</p>
                          </div>
                        </div>
                        <div class="mt-2 d-flex gap-3">
                            <form method="POST" action="{{ route('teachers.destroy', [$teacher]) }}" class="m-0">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('teachers.edit', [$teacher]) }}" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalToggle">Eliminar</a>
                                <x-modal_template_delete>
                                    <x-slot name="titulo">¿Estás seguro que quiere ELIMINAR este alumno?</x-slot>
                                    <x-slot name="contenido">Los datos NO pordrán modificar más adelante.</x-slot>
                                </x-modal_template_delete>
                            </form>
                            {{-- <a href="{{ route('users.index', [$teacher]) }}" class="btn btn-secondary">Volver</a> --}}
                        </div>
                    </div>
                </div>
  
                <!-- Actividades Recientes -->
                <x-acordion>
                  <x-slot name="numero">1</x-slot>
                  <x-slot name="titulo">Actividades recientes</x-slot>
                  <x-slot name="body">
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
                  </x-slot>
              </x-acordion>
            </div>
        </div>
        <x-acordion>
          <x-slot name="numero">2</x-slot>
          <x-slot name="titulo">Cursos</x-slot>
          <x-slot name="body">
  
              <x-table>
                  <x-slot name="table_head">
                      <thead>
                          <tr>
                              <th>Año</th>
                              <th>División</th>
                              <th>Carrera</th>
                              <th></th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                  </x-slot>
  
                  <x-slot name="table_body">
                      <tbody class="table-borde-bottom-0">
  
                          @foreach ($teacher->courses as $course)
                              <x-table-item>
                                  <x-slot name="fila_url">{{ route('courses.show', [$course->id]) }}</x-slot>
                                  <x-slot name="nombre">{{ $course->course_number }}</x-slot>
                                  <x-slot name="apellido">{{ $course->section }}</x-slot>
                                  <x-slot name="usuario">{{ $course->career->name }}</x-slot>
                                  <x-slot name="rol"></x-slot>
                                  <x-slot name="editar_url">{{ route('courses.edit', [$course->id]) }}</x-slot>
                              </x-table-item>
                          @endforeach
                      </tbody>
                  </x-slot>
              </x-table>
  
          </x-slot>
  
      </x-acordion>
  
      <x-acordion>
          <x-slot name="numero">3</x-slot>
          <x-slot name="titulo">Exámenes</x-slot>
          <x-slot name="body">
  
              <x-table>
                  <x-slot name="table_head">
                      <thead>
                          <tr>
                              <th>Exámen</th>
                              <th>Materia</th>
                              <th>Fecha</th>
                              <th>Cursos</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                  </x-slot>
  
                  <x-slot name="table_body">
                      <tbody class="table-borde-bottom-0">
                          @foreach ($exams as $exam)
                                <tr onclick="if(!event.target.closest('.dropdown') && !event.target.closest('.avatar a')) { window.location.href='{{ route('exams.show', [$exam->id]) }}'; }" style="cursor: pointer;">
                                <td><strong>N°{{$exam->number}}</strong></td>
                                <td>{{ $exam->teacherSubject->subject->name }}</td>
                                <td>{{ $exam->date }}</td>
                                <td>
                                    <span class="badge bg-label-primary me-1">
                                        @if ($exam->courses->isEmpty())
                                            Sin curso asignado
                                        @else
                                            @foreach ($exam->courses as $course)
                                                @if ($course)
                                                    {{$course->course_number}}°{{$course->section}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>                 
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('exams.edit', [$exam->id]) }}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                                            {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Quitar profesor</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                  </x-slot>
              </x-table>
  
          </x-slot>
  
      </x-acordion>
    </div>
    <x-floating-icon>
        <x-slot name="url">{{ route('teachers.create') }}</x-slot>
        <x-slot name="texto">Profesor +</x-slot>
    </x-floating-icon>
  </x-template-layout>
  