<x-template-layout>
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Crear un horario</x-slot>
            <x-slot name="action">{{route('timetables.update', $timetable)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-select>
                    <x-slot name="titulo">Institución</x-slot>
                    <x-slot name="name">institution_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una institución</option>
                        @foreach ($institutions as $institution)
                            <option value="{{ $institution->id }}" {{old('institution_id', $timetable->course->career->institution_id) == $institution->id ? 'selected' : ''}}>
                                {{ $institution->name }}
                            </option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Carrera</x-slot>
                    <x-slot name="name">career_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una carrera</option>
                        @foreach ($careers as $career)
                            <option value="{{ $career->id }}" {{old('career_id', $timetable->course->career->id) == $career->id ? 'selected' : ''}}>
                                {{ $career->name }}
                            </option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Curso</x-slot>
                    <x-slot name="name">course_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione un curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{old('course_id', $timetable->course->id) == $course->id ? 'selected' : ''}}>
                                {{ $course->course_number }}°{{ $course->section }}
                            </option>
                        @endforeach
                    </x-slot>
                </x-input-select>

                <hr>

                @php
                // Agrupar los time_slots por día de la semana
                $groupedTimeSlots = $timetable->timeSlots->groupBy(function ($time_slot) {
                    return $time_slot->daysofweek->id ?? null;
                });
            
                // Contador de días (para nombres de los inputs)
                $dayCount = 0;
            @endphp
            
            @foreach ($groupedTimeSlots as $dayId => $timeSlots)
                @php
                    $dayCount++;
                    $materiaCount = 0; // Reiniciar contador de materias para cada día
                @endphp
            
                <div id="dias-container">
                    <div class="dia-input-group" id="dia-{{ $dayCount }}">
                        <x-input-select>
                            <x-slot name="titulo">Día de la semana {{ $dayCount }}</x-slot>
                            <x-slot name="name">days_of_week_id[{{ $dayCount }}]</x-slot>
                            <x-slot name="opciones">
                                <option value="" selected hidden>Seleccione un día</option>
                                @foreach ($days_of_weeks as $day_of_week)
                                    <option value="{{ $day_of_week->id }}" {{ $dayId == $day_of_week->id ? 'selected' : '' }}>
                                        {{ $day_of_week->day }}
                                    </option>
                                @endforeach
                            </x-slot>
                        </x-input-select>
            
                        <div id="materias-container-{{ $dayCount }}">
                            @foreach ($timeSlots as $time_slot)
                                @php
                                    $materiaCount++;
                                @endphp
            
                                <div class="materia-input-group">
                                    <x-input-select>
                                        <x-slot name="titulo">Materia {{ $materiaCount }}</x-slot>
                                        <x-slot name="name">subject_id[{{ $dayCount }}][{{ $materiaCount }}]</x-slot>
                                        <x-slot name="opciones">
                                            <option value="" selected hidden>Seleccione una materia</option>
                                            @foreach ($subjects as $subjectOption)
                                                <option value="{{ $subjectOption->id }}" {{ old('subject_id[' . $dayCount . '][' . $materiaCount . ']', $time_slot->subject->id ?? '') == $subjectOption->id ? 'selected' : '' }}>
                                                    {{ $subjectOption->name }}
                                                </option>
                                            @endforeach
                                        </x-slot>
                                    </x-input-select>
            
                                    <x-input-time>
                                        <x-slot name="titulo">Inicio/Fin {{ $materiaCount }}</x-slot>
                                        <x-slot name="name1">start_time[{{ $dayCount }}][{{ $materiaCount }}]</x-slot>
                                        <x-slot name="value1">{{ old('start_time[' . $dayCount . '][' . $materiaCount . ']', $time_slot->start_time ?? '') }}</x-slot>
                                        <x-slot name="name2">end_time[{{ $dayCount }}][{{ $materiaCount }}]</x-slot>
                                        <x-slot name="value2">{{ old('end_time[' . $dayCount . '][' . $materiaCount . ']', $time_slot->end_time ?? '') }}</x-slot>
                                    </x-input-time>
            
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            
            


                <button type="button" class="btn btn-primary mt-3" id="add-dia">+ Añadir día</button>
                <button type="button" class="btn btn-danger mt-3" id="remove-dia">- Eliminar último día</button>

            </x-slot>

            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere crear este horario?</x-slot>
                    <x-slot name="contenido">Los datos se podrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>

            <x-slot name="volver_url">{{ route('timetables.index') }}</x-slot>
        </x-form-horizontal-icon>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>    
            @endforeach
        </ul>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addDiaButton = document.getElementById('add-dia');
            const removeDiaButton = document.getElementById('remove-dia');
            const diasContainer = document.getElementById('dias-container');

            let diaCount = 0;  // Contador para asegurar que se agreguen los campos dinámicos correctamente
            let nextDayId = 1; // El primer día será lunes (ID 1)

            addDiaButton.addEventListener('click', function () {
    diaCount++; // Incrementar el contador de días

    const diaHTML = `
        <div class="dia-input-group" id="dia-${diaCount}">
            <x-input-select>
                <x-slot name="titulo">Día de la semana ${diaCount}</x-slot>
                <x-slot name="name">days_of_week_id[${diaCount}]</x-slot>
                <x-slot name="opciones">
                    <option value="" selected hidden>Seleccione un día</option>
                    @foreach ($days_of_weeks as $day_of_week)
                        <option value="{{ $day_of_week->id }}" ${nextDayId === {{ $day_of_week->id }} ? 'selected' : ''}>
                            {{ $day_of_week->day }}
                        </option>
                    @endforeach
                </x-slot>
            </x-input-select>

            <div id="materias-container-${diaCount}">
                <!-- Contenedor para las materias dinámicas de este día -->
            </div>

            <button type="button" class="btn btn-primary mt-3" onclick="addMateriaDia(${diaCount})">+ Añadir materia</button>
            <button type="button" class="btn btn-danger mt-3" onclick="removeMateriaDia(${diaCount})">- Eliminar última materia</button>

            <hr>
        </div>
    `;
    diasContainer.insertAdjacentHTML('beforeend', diaHTML);

    // Incrementa el día para el siguiente
    nextDayId = (nextDayId % 7) + 1; // Ciclo de lunes (1) a domingo (7)

    // Llamar a la función para agregar una materia automáticamente
    addMateriaDia(diaCount);  // Esto añadirá la primera materia al día recién agregado
});

            removeDiaButton.addEventListener('click', function () {
                if (diaCount > 0) {
                    const lastDia = document.getElementById(`dia-${diaCount}`);
                    diasContainer.removeChild(lastDia);
                    diaCount--; // Decrementar el contador de días

                    // Ajustar el siguiente día si se elimina uno
                    nextDayId = (nextDayId === 1) ? 7 : nextDayId - 1; // Asegura que no se salga de la secuencia
                }
            });
        });

        // Función para agregar materias a un día específico
        function addMateriaDia(diaCount) {
            const materiasContainer = document.getElementById(`materias-container-${diaCount}`);
            const materiaCount = materiasContainer.querySelectorAll('.materia-input-group').length + 1;  // Contador de materias por día

            const materiaHTML = `
                <div class="materia-input-group">
                    <x-input-select>
                        <x-slot name="titulo">Materia ${materiaCount}</x-slot>
                        <x-slot name="name">subject_id[${diaCount}][${materiaCount}]</x-slot>
                        <x-slot name="opciones">
                            <option value="" selected hidden>Seleccione una materia</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </x-slot>
                    </x-input-select>

                    <x-input-time>
                        <x-slot name="titulo">Inicio/Fin ${materiaCount}</x-slot>
                        <x-slot name="name1">start_time[${diaCount}][${materiaCount}]</x-slot>
                        <x-slot name="value1"></x-slot>
                        <x-slot name="name2">end_time[${diaCount}][${materiaCount}]</x-slot>
                        <x-slot name="value2"></x-slot>
                    </x-input-time>

                    <hr>
                </div>
            `;
            materiasContainer.insertAdjacentHTML('beforeend', materiaHTML);
        }

        // Función para eliminar la última materia de un día específico
        function removeMateriaDia(diaCount) {
            const materiasContainer = document.getElementById(`materias-container-${diaCount}`);
            const materiaGroups = materiasContainer.querySelectorAll('.materia-input-group');
            if (materiaGroups.length > 0) {
                materiasContainer.removeChild(materiaGroups[materiaGroups.length - 1]);
            }
        }
    </script>
</x-template-layout>
