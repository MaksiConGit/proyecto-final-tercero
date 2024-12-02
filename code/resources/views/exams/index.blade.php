<x-template-layout>
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Exámenes</h4>

        @foreach ($courses as $course)
        <div class="mb-4">
            <!-- Encabezado del curso -->
            <h5 
                class="text-decoration-none text-primary badge bg-label-primary me-1" 
                style="font-size: 1.2rem; padding: 0.5rem 1rem; border-radius: 8px;">
                {{$course->course_number}}°{{$course->section}}
            </h5>
            
            @if ($course->exams->isNotEmpty())
            <!-- Tabla de exámenes -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered shadow-sm rounded">
                    <thead class="bg-light">
                        <tr>
                            <th>Parcial N°</th>
                            <th>Materia</th>
                            <th>Profesor</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->exams as $exam)
                        <tr onclick="if(!event.target.closest('.dropdown') && !event.target.closest('.avatar a')) { window.location.href='{{ route('exams.show', [$exam]) }}'; }" style="cursor: pointer;">
                            <td><strong>{{$exam->number}}</strong></td>
                            <td>
                                <a href="{{ route('subjects.show', [$exam->teacherSubject->subject]) }}" 
                                   class="text-decoration-none text-primary"
                                   onclick="event.stopPropagation();">
                                    {{$exam->teacherSubject->subject->name}}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('teachers.show', [$exam->teacherSubject->teacher]) }}" 
                                   class="text-decoration-none text-primary"
                                   onclick="event.stopPropagation();">
                                    {{$exam->teacherSubject->teacher->name}}, {{$exam->teacherSubject->teacher->lastname}}
                                </a>
                            </td>
                            <td>{{$exam->date}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('exams.edit', [$exam]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Editar
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-muted">No tiene exámenes asignados.</p>
            @endif
        </div>
        @endforeach
    </div>

    <x-floating-icon-exams></x-floating-icon-exams>
</x-template-layout>
