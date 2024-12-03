<div>
    @foreach ($selectedData as $index => $data)
        <div>
            <!-- Selección de Institución -->
            <x-input-select wire:model.live="selectedData.{{ $index }}.selectedInstitution">
                <x-slot name="titulo">Institución</x-slot>
                <x-slot name="name">selectedData[{{ $index }}][institution]</x-slot>
                <x-slot name="opciones">
                    <option value="">Seleccionar Institución</option>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach
                </x-slot>
            </x-input-select>

            <!-- Selección de Carrera -->
            <x-input-select wire:model.live="selectedData.{{ $index }}.selectedCareer">
                <x-slot name="titulo">Carrera</x-slot>
                <x-slot name="name">selectedData[{{ $index }}][career]</x-slot>
                <x-slot name="opciones">
                    <option value="">Seleccionar Carrera</option>
                    @if (isset($careers[$index]))
                        @foreach ($careers[$index] as $career)
                            <option value="{{ $career->id }}">{{ $career->name }}</option>
                        @endforeach
                    @endif
                </x-slot>
            </x-input-select>

            <!-- Cursos -->
            <p>Cursos</p>
            @if (isset($courses[$index]))
                @foreach ($courses[$index] as $course)
                    <label for="course_{{ $index }}_{{ $course->id }}">
                        {{ $course->course_number . '° ' . $course->section }}
                    </label>
                    <input type="checkbox" name="selectedData[{{ $index }}][courses][]"
                        id="course_{{ $index }}_{{ $course->id }}" value="{{ $course->id }}"
                        {{-- Marcar como seleccionado si está en el arreglo de cursos seleccionados --}} @if (in_array($course->id, $data['selectedCourses'])) checked @endif>
                    <br>
                @endforeach
            @endif
            <hr>
        </div>
        <!-- Botón para eliminar carreras -->
        <x-secondary-button wire:click="removeCareer({{ $index }})">
            - Quitar Carrera
        </x-secondary-button>
    @endforeach

    <!-- Botón para añadir carreras -->
    <x-secondary-button wire:click="addCareer">
        + Añadir Carrera
    </x-secondary-button>
</div>
