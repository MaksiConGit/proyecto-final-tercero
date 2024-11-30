<x-template-layout>
    <div class="container">
        {{-- @if ($subject->teacherSubject->isNotEmpty()) --}}
        <div class="container">
            <h3>Asistencias</h3>
            <h5>{{Carbon\Carbon::now()->toDateString()}}</h5>

        </div>

        @foreach ($courses as $course)

            <x-form-horizontal-icon>
                <x-slot name="titulo">{{$course->course_number}}°{{$course->section}}</x-slot>
                <x-slot name="action">{{route('attendance_records.store')}}</x-slot>
                <x-slot name="method"></x-slot>
                <x-slot name="inputs">
                    <x-table>

                        <x-slot name="table_head">
                            <thead>
                                <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Asistió</th>
                                {{-- <th></th> --}}
                                {{-- <th>Acciones</th> --}}
                                </tr>
                            </thead>
                        </x-slot>
            
                        <x-slot name="table_body">
                            <tbody class="table-borde-bottom-0">
            
                                {{-- @foreach ($students as $student)
            
                                    <x-table-item>
                                        <x-slot name="fila_url">{{route('students.show', [$student->id])}}</x-slot>
                                        <x-slot name="nombre">{{$student->name}}</x-slot>
                                        <x-slot name="apellido">{{$student->lastname}}</x-slot>
                                        <x-slot name="nombre_usuario"></x-slot>
                                        <x-slot name="usuario"></x-slot>
                                        <x-slot name="rol"></x-slot>
                                        <x-slot name="editar_url">{{route('students.edit', [$student->id])}}</x-slot>
                                        <x-slot name="attended">
                                            <x-input-checkbox>
                                                <x-slot name="id">has_attended_{{ $student->id }}</x-slot>
                                                <x-slot name="value">1</x-slot>
                                                <x-slot name="name">attendance_records[{{ $student->id }}][has_attended]</x-slot>
                                                <x-slot name="for">attendance_records{{ $student->id }}</x-slot>
                                                <x-slot name="checked"></x-slot>
                                                <x-slot name="texto"></x-slot>
                                            </x-input-checkbox>
                                        </x-slot>
                                    </x-table-item>
            
                                @endforeach --}}


                                    @foreach ($course->students as $student)
                                        <tr>
                                            <!-- Nombre del Estudiante -->
                                            <td>{{ $student->name }}</td>

                                            <!-- Apellido del Estudiante -->
                                            <td>{{ $student->lastname }}</td>

                                            <!-- Campo Oculto para student_id -->
                                            <td>
                                                <input type="hidden" 
                                                    name="attendance_records[{{ $student->id }}][student_id]" 
                                                    value="{{ $student->id }}">

                                                <!-- Checkbox para Asistencia -->
                                                <input type="checkbox" 
                                                    id="has_attended_{{ $student->id }}" 
                                                    name="attendance_records[{{ $student->id }}][has_attended]" 
                                                    value="1">
                                            </td>
                                        </tr>
                                    @endforeach

            
                                

                            </tbody>
                        </x-slot>
            
                    </x-table>

                    {{-- <x-input-text>
                        <x-slot name="icon">bx bx-buildings</x-slot>
                        <x-slot name="titulo">Nombre</x-slot>
                        <x-slot name="name">name</x-slot>
                        <x-slot name="placeholder">Nombre</x-slot>
                        <x-slot name="value">{{old('name')}}</x-slot>
                    </x-input-text> --}}
                    {{-- <x-input-select>
                        <x-slot name="titulo">Institución</x-slot>
                        <x-slot name="name">institution_id</x-slot>
                        <x-slot name="opciones">
                            <option value="" selected hidden>Seleccione una institución</option>
                            @foreach ($institutions as $institution)
                                <option {{ old('institution_id') == $institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                            @endforeach
                        </x-slot>
                    </x-input-select> --}}
                </x-slot>
                <x-slot name="modal">
                    <x-modal_template>
                        <x-slot name="titulo">¿Estás seguro que quiere crear esta carrera?</x-slot>
                        <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
                    </x-modal_template>
                </x-slot>
                <x-slot name="volver_url">{{route('attendance_records.index')}}</x-slot>
            </x-form-horizontal-icon>

        @endforeach

        
        {{-- @else
            No tiene profesor asignado.
        @endif --}}
    </div>
</x-template-layout>
