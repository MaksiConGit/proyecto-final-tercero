<div>
    <label for="institution">Institucion</label>
    <select wire:model.live="selectedInstitution" name="institution" id="institution">
        <option value="">Seleccionar Institucion</option>

        @foreach ($institutions as $institution)
            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
        @endforeach
    </select>
    <br>

    <label for="career">Carrera</label>
    <select wire:model.live="selectedCareer" name="career" id="career">
        <option value="">Seleccionar Carrera</option>

        @if ($careers && $careers->isNotEmpty())
            @foreach ($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        @endif
    </select>
    <br>
    <p>Cursos</p>
    @if ($courses)
        @foreach ($courses as $course)
        <label for="course" title="Seleccionar todos los cursos que podra ver el usuario">{{ $course->course_number . "° " . $course->section }}</label>
            <input type="checkbox" name="course[]" id="" title="Seleccionar todos los cursos que podra ver el usuario" value="{{ $course->id }}">
            <br>
        @endforeach
    @endif
</div>
