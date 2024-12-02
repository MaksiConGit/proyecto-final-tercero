<div>
    <!-- Filtro por Institución -->
    <x-input-select wire:model.live="selectedInstitution">
        <x-slot name="titulo">Institución</x-slot>
        <x-slot name="name">institution</x-slot>
        <x-slot name="opciones">
            <option value="">Selecciona una institución</option>
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>
    <!-- Filtro por Carrera -->
    <x-input-select wire:model.live="selectedCareer">
        <x-slot name="titulo">Carrera</x-slot>
        <x-slot name="name">career</x-slot>
        <x-slot name="opciones">
            <option value="">Todas las carreras</option>
            @foreach ($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>


    <!-- Filtro por Curso -->
    <x-input-select wire:model.live="selectedCourse">
        <x-slot name="titulo">Curso</x-slot>
        <x-slot name="name">course</x-slot>
        <x-slot name="opciones">
            <option value="">Todos los cursos</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_number }}° {{ $course->section }}</option>
            @endforeach
        </x-slot>
    </x-input-select>

    <div class="d-flex flex-column align-items-stretch gap-3">
        @foreach ($students as $student)
            <div class="row mb-1">
                <div class="col-md">
                    <div class="card position-relative">
                        <a href="{{ route('students.show', [$student->id]) }}" class="stretched-link"></a>
                        <div class="row g-8">
                            <div class="col-md-2">
                                <img class="card-img card-img-left"
                                    src="../../template_files/assets/img/elements/12.jpg" alt="Card image" />
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $student->name . ', ' . $student->lastname }}</h5>
                                    <p class="card-text">
                                        Usuario:
                                        @if ($student->user)
                                            <a href="{{ route('users.show', [$student->user->id]) }}"
                                                class="internal-link">
                                                {{ $student->user->name }}
                                            </a>
                                        @else
                                            Sin asignar.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tabla de Estudiantes -->
    {{-- <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cursos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }} {{ $student->lastname }}</td>
                    <td>
                        @foreach ($student->courses as $course)
                            {{ $course->course_number }}° {{ $course->section }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

</div>
