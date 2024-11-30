<div>
    <!-- Select de instituciones -->
    <div>
        <label for="institution">Institución</label>
        <select id="institution" wire:model.live="selectedInstitution">
            <option value="" selected>Seleccione una institución</option>
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select de carreras dependientes -->
    <div>
        <label for="career">Carrera</label>
        <select id="career" wire:model.live="selectedCareer" @if (!$careers) disabled @endif>
            <option value="" selected>Seleccione una carrera</option>
            @foreach ($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select de cursos dependientes -->
    <div>
        <label for="course">Cursos</label>
        <select id="course" wire:model.live="selectedCourse" @if (!$courses) disabled @endif>
            <option value="" selected>Seleccione un curso</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_number . '° ' . $course->section }}</option>
            @endforeach
        </select>
    </div>

    <hr>

    <div>
        <label for="date">Ingrese fecha</label>
        <input type="date" name="date" id="" required>
    </div>

    @if ($course_students)
        <h2>Estudiantes del Curso</h2>
        <table>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>¿Asistió?</td>
            </tr>
            @foreach ($course_students as $course)
                <tr>
                    <td>{{ $course->student->name }}</td>
                    <td>{{ $course->student->lastname }} </td>
                    <td>
                        <input type="hidden" name="attendance[{{ $course->id }}]" value="0">
                        <input type="checkbox" name="attendance[{{ $course->id }}]" value="1">
                    </td>
                    
                </tr>
            @endforeach
        </table>
    @endif

</div>
