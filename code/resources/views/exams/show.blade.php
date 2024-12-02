<x-template-layout>

    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Exámenes /</span> Mostrar Examen
        </h4>
        <x-icon-dropdown>
            <x-slot name="titulo">{{ $exam->subject->name }} {{ $exam->number }}</x-slot>
            <x-slot name="subtitulo">
                @foreach ($exam->courseExams->unique(fn($courseExam) => $courseExam->course->career->institution->id) as $courseExam)
                    <p class="mb-3" style="white-space: nowrap;">
                        {{$courseExam->course->career->name}} / {{$courseExam->course->career->institution->name}}
                    </p>    
                @endforeach
            </x-slot>
            <x-slot name="url_editar">{{ route('exams.edit', $exam) }}</x-slot>
            <x-slot name="url_eliminar">{{ route('exams.destroy', $exam) }}</x-slot>
        </x-icon-dropdown>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
            <div class="col">
                <div class="card user-card position-relative">
                    <a href="{{ route('users.show', [$exam->teacher->id]) }}" class="stretched-link"></a>
                    <div class="d-flex align-items-center p-3">
                        <img src="../../template_files/assets/img/elements/12.jpg" alt="User image" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="card-title mb-1">{{ $exam->teacher->name }}</h5>
                            <p class="card-text mb-0">
                                <small class="text-muted">Profesor</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card user-card position-relative">
                    <a href="{{ route('users.show', [$exam->teacher->id]) }}" class="stretched-link"></a>
                    <div class="d-flex align-items-center p-3">
                        <img src="../../template_files/assets/img/elements/12.jpg" alt="User image" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="card-title mb-1">{{ $exam->subject->name }}</h5>
                            <p class="card-text mb-0">
                                <small class="text-muted">Materia</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <x-acordion>
                <x-slot name="numero">1</x-slot>
                <x-slot name="titulo">Estudiantes</x-slot>
                <x-slot name="body">
                    <x-table>
                        <x-slot name="table_head">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Nota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </x-slot>

                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">
                                @foreach ($exam->grades as $grade)
                                    <x-table-item>
                                        <x-slot name="fila_url">{{ route('students.show', [$grade->student->id]) }}</x-slot>
                                        <x-slot name="nombre">{{ $grade->student->name }}</x-slot>
                                        <x-slot name="apellido">{{ $grade->student->lastname }}</x-slot>  
                                        <x-slot name="rol">{{ $grade->grade }}</x-slot>
                                        <x-slot name="usuario">
                                            <x-td-user>
                                                <x-slot name="nombre_usuario">{{ $grade->student->user->name }}</x-slot>
                                                <x-slot name="usuario_url">{{ route('users.edit', [$grade->student->user->id]) }}</x-slot>
                                            </x-td-user>
                                        </x-slot>   
                                        <x-slot name="editar_url">{{ route('students.edit', [$grade->student->id]) }}</x-slot>
                                    </x-table-item>
                                @endforeach
                            </tbody>
                        </x-slot>
                    </x-table>
                </x-slot>
            </x-acordion>
        </div>
    </div>

    <x-floating-icon>
        <x-slot name="url">{{ route('exams.create') }}</x-slot>
    </x-floating-icon>
    
</x-template-layout>
