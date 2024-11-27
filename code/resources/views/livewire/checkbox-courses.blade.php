<div>
    <h2><strong>Asignar Cursos</strong></h2>
    @foreach ($selectedData as $index => $data)
        <div>
            <button type="button" wire:click="removeCareer({{ $index }})">Eliminar Carrera ></button>
            <br>
            <!-- Selección de Institución -->
            <label for="institution_{{ $index }}">Institución</label>
            <select wire:model.live="selectedData.{{ $index }}.selectedInstitution"
                name="selectedData[{{ $index }}][institution]" id="institution_{{ $index }}">
                <option value="">Seleccionar Institución</option>
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                @endforeach
            </select>
            <br>

            <!-- Selección de Carrera -->
            <label for="career_{{ $index }}">Carrera</label>
            <select wire:model.live="selectedData.{{ $index }}.selectedCareer"
                name="selectedData[{{ $index }}][career]" id="career_{{ $index }}">
                <option value="">Seleccionar Carrera</option>
                @if (isset($careers[$index]))
                    @foreach ($careers[$index] as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @endforeach
                @endif
            </select>
            <br>

            <!-- Cursos -->
            <p>Cursos</p>
            @if (isset($courses[$index]))
                @foreach ($courses[$index] as $course)
                    <label for="course_{{ $index }}_{{ $course->id }}">
                        {{ $course->course_number . '° ' . $course->section }}
                    </label>
                    <input 
                        type="checkbox" 
                        name="selectedData[{{ $index }}][courses][]" 
                        id="course_{{ $index }}_{{ $course->id }}" 
                        value="{{ $course->id }}"
                        {{-- Marcar como seleccionado si está en el arreglo de cursos seleccionados --}}
                        @if (in_array($course->id, $data['selectedCourses'])) checked @endif
                    >
                    <br>
                @endforeach
            @endif
            <hr>
        </div>
    @endforeach

    <!-- Botón para añadir carreras -->
    <button type="button" wire:click="addCareer">Añadir Carrera ></button>
</div>
