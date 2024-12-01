<div>
    <!-- Select de instituciones -->
    <x-input-select wire:model.live="selectedInstitution">
        <x-slot name="titulo">Institución</x-slot>
        <x-slot name="name">institution</x-slot>
        <x-slot name="opciones">
            <option value="" selected>Seleccione una institución</option>
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>
    <!-- Select de carreras dependientes -->
    <x-input-select wire:model.live="selectedCareer">
        <x-slot name="titulo">Carrera</x-slot>
        <x-slot name="name">career</x-slot>
        <x-slot name="opciones">
            <option value="" selected>Seleccione una carrera</option>
            @foreach ($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>

    <!-- Select de cursos dependientes -->
    <x-input-select wire:model.live="selectedCourse">
        <x-slot name="titulo">Cursos</x-slot>
        <x-slot name="name">courses</x-slot>
        <x-slot name="opciones">
            <option value="" selected>Seleccione un curso</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_number . '° ' . $course->section }}</option>
            @endforeach
        </x-slot>
    </x-input-select>

    <x-form-horizontal-icon>

        

        <x-slot name="titulo">
            Curso:
            @if ($courseName)
                {{ $courseName }}
            @else
                Ningun curso seleccionado
            @endif
        </x-slot>
        <x-slot name="action">{{ route('attendance_records.store') }}</x-slot>
        <x-slot name="method"></x-slot>
        <x-slot name="inputs">
            <x-input-date>
                <x-slot name="titulo">Ingrese Fecha</x-slot>
                <x-slot name="name">date</x-slot>
                <x-slot name="value">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</x-slot>
            </x-input-date>
            <x-table>
                <x-slot name="table_head">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>¿Asistió?</th>
                        </tr>
                    </thead>
                </x-slot>

                <x-slot name="table_body">
                    <tbody class="table-borde-bottom-0">
                        @foreach ($course_students as $course)
                            <tr>
                                <!-- Nombre del Estudiante -->
                                <td>{{ $course->student->name }}</td>
                                <!-- Apellido del Estudiante -->
                                <td>{{ $course->student->lastname }} </td>

                                <td>
                                    <!-- Campo Oculto para student_id -->
                                    <input type="hidden" name="attendance[{{ $course->id }}]" value="0">
                                    <!-- Checkbox para Asistencia -->
                                    <input type="checkbox" name="attendance[{{ $course->id }}]" value="1">
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </x-slot>
            </x-table>
        </x-slot>
        <x-slot name="modal">
            <x-modal_template>
                <x-slot name="titulo">¿Estás seguro que quiere crear esta carrera?</x-slot>
                <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
            </x-modal_template>
        </x-slot>
        <x-slot name="volver_url">{{ route('attendance_records.index') }}</x-slot>
    </x-form-horizontal-icon>
</div>
