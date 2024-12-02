{{-- <x-template-layout>
    
  <div class="container">
      <h1>Estudiante: {{ $student->name }}</h1>
      <ul>
          <li>DNI: {{ $student->dni }}</li>
          <li>Phone: {{ $student->phone }}</li>
          <li>Birhtdate: {{ $student->birthdate }}</li>
          <li>City: {{ $student->city ? $student->city->name : 'Sin ciudad asignada.' }}</li>
          <li>
              @if ($student->user)
                  User: {{ $student->user->name }}
              @else
                  No tiene usuario asignado.
              @endif
          </li>
      </ul>

      <h5>Asistencia General Promedio</h5>

      <p>-- Aca irian las asistencias o debajo de todo --</p>

      <x-acordion>
          <x-slot name="numero">1</x-slot>
          <x-slot name="titulo">Cursos</x-slot>
          <x-slot name="body">

              <x-table>
                  <x-slot name="table_head">
                      <thead>
                          <tr>
                              <th>Año</th>
                              <th>División</th>
                              <th>Carrera</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                  </x-slot>

                  <x-slot name="table_body">
                      <tbody class="table-borde-bottom-0">

                          @foreach ($student->courses as $course)
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
          <x-slot name="numero">2</x-slot>
          <x-slot name="titulo">Exámenes</x-slot>
          <x-slot name="body">

              <x-table>
                  <x-slot name="table_head">
                      <thead>
                          <tr>
                              <th>Exámen</th>
                              <th>Profesor</th>
                              <th>Materia</th>
                              <th>Nota</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                  </x-slot>

                  <x-slot name="table_body">
                      <tbody class="table-borde-bottom-0">

                          @foreach ($exams as $exam)
                              @php
                                  // Filtra los cursos del examen que coinciden con los cursos del estudiante actual
                                  $studentCourses = $student->courses;
                                  $examCourses = $exam->courses->intersect($studentCourses);
                              @endphp

                              @if ($examCourses->isNotEmpty())
                                  <!-- Solo muestra el examen si hay cursos válidos -->
                                  <x-table-item>
                                      <x-slot name="fila_url">{{ route('exams.show', [$exam->id]) }}</x-slot>
                                      <x-slot name="nombre">N°{{ $exam->number . ' / ' . $exam->date }}</x-slot>
                                      <x-slot
                                          name="apellido">{{ $exam->teacherSubject->teacher->name . ' ' . $exam->teacherSubject->teacher->lastname }}</x-slot>
                                      <x-slot name="usuario">
                                          {{ $exam->teacherSubject->subject->name }} de
                                          @foreach ($examCourses as $course)
                                              {{ $course->course_number }}° {{ $course->section }}
                                          @endforeach
                                      </x-slot>
                                      <x-slot name="rol">
                                          @if ($exam->grades->isNotEmpty())
                                              {{ $exam->grades->first()->grade }}
                                          @else
                                              No realizado
                                          @endif
                                      </x-slot>
                                      <x-slot name="editar_url">{{ route('exams.edit', [$exam->id]) }}</x-slot>
                                  </x-table-item>
                              @endif
                          @endforeach
                      </tbody>
                  </x-slot>
              </x-table>

          </x-slot>

      </x-acordion>

  </div>

  
</x-template-layout> --}}

<x-template-layout>
  <div class="container-xxl flex-grow-1 container">
      <h4 class="fw-bold py-3 mb-4">
          <span class="text-muted fw-light">Estudiantes /</span> Detalle del Estudiante
      </h4>

      <div class="row">
          <div class="col-md-12">
              <!-- Información del Usuario -->
              <div class="card mb-4">
                  <h5 class="card-header">Información del Estudiante</h5>
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
                              <h4>{{$student->name}}, {{$student->lastname}}</h4>
                              <p class="text-muted mb-0">{{$student->email}}</p>
                              @foreach ($student->courses as $course)
                              <span class="badge bg-primary mt-2">{{$course->course_number}}°{{$course->section}}</span>
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
                            @if ($student->user)
                              <a href="{{ route('users.show', [$student->user]) }}">{{$student->user->name}}</a>
                            @else
                              <a href="{{ route('users.create') }}">Crear usuario</a>
                            @endif
                          </p>
                        </div>
                          <div class="mb-3 col-md-6">
                              <label class="form-label fw-bold text-primary">Rol</label>
                              <br>
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
                                    Rol no asignado.
                                @endif

                            </p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">DNI</label>
                            <p class="form-control-plaintext text-dark">{{$student->dni}}</p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">Teléfono</label>
                            <p class="form-control-plaintext text-dark">{{$student->phone}}</p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">Fecha de nacimiento</label>
                            <p class="form-control-plaintext text-dark">{{$student->birthdate}}</p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">Ciudad</label>
                            <p class="form-control-plaintext text-dark">{{$student->city->name}}</p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label fw-bold text-primary">Fecha de Registro</label>
                            <p class="form-control-plaintext text-dark">{{$student->created_at}}</p>
                        </div>
                      </div>
                      <div class="mt-2 d-flex gap-3">
                          <form method="POST" action="{{ route('students.destroy', [$student]) }}" class="m-0">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('students.edit', [$student]) }}" class="btn btn-primary">Editar</a>
                              <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalToggle">Eliminar</a>
                              <x-modal_template_delete>
                                  <x-slot name="titulo">¿Estás seguro que quiere ELIMINAR este alumno?</x-slot>
                                  <x-slot name="contenido">Los datos NO pordrán modificar más adelante.</x-slot>
                              </x-modal_template_delete>
                          </form>
                          {{-- <a href="{{ route('users.index', [$student]) }}" class="btn btn-secondary">Volver</a> --}}
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

                        @foreach ($student->courses as $course)
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
                            <th>Nota</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </x-slot>

                <x-slot name="table_body">
                    <tbody class="table-borde-bottom-0">

                        @foreach ($exams as $exam)
                            @php
                                // Filtra los cursos del examen que coinciden con los cursos del estudiante actual
                                $studentCourses = $student->courses;
                                $examCourses = $exam->courses->intersect($studentCourses);
                            @endphp

                            @if ($examCourses->isNotEmpty())
                                <tr onclick="if(!event.target.closest('.dropdown') && !event.target.closest('.avatar a')) { window.location.href='{{ route('exams.show', [$exam->id]) }}'; }" style="cursor: pointer;">
                                  <td><strong>N°{{$exam->number}}</strong></td>
                                  <td>{{ $exam->teacherSubject->subject->name }}</td>
                                  <td>{{ $exam->date }}</td>
                                  <td><span class="badge bg-label-primary me-1">
                                    @php
                                      $tiene_nota = false;
                                    @endphp
                                    @foreach ($exam->grades as $grade)
                                      @if ($grade->student_id == $student->id)
                                        @php
                                          $tiene_nota = true;   
                                        @endphp
                                      @endif
                                    @endforeach

                                    @if ($tiene_nota)
                                      {{$grade->grade}}
                                    @else
                                    No asignada
                                    @endif
                                    </span>
                                  </td>
                                  <td>{{ $exam->teacherSubject->teacher->name}}, {{$exam->teacherSubject->teacher->lastname }}</td>
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
                            @endif
                        @endforeach
                    </tbody>
                </x-slot>
            </x-table>

        </x-slot>

    </x-acordion>
  </div>
</x-template-layout>
