<div>
    <div class="mb-3">
        <label for="courseSelect">Seleccionar curso</label>
        <select id="courseSelect" class="form-select" wire:model.live="selectedCourse">
            <option value="">-- Selecciona un curso --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_number . "° " . $course->section }}</option>
            @endforeach
        </select>
    </div>

    @if ($exams)
        <div class="mb-3">
            <label for="examSelect">Seleccionar examen</label>
            <select id="examSelect" class="form-select" name="exam" wire:model.live="selectedExam">
                <option value="">-- Selecciona un examen --</option>
                @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}">Examen {{ $exam->number }} - {{ $exam->date }} - {{$exam->teacherSubject->subject->name}}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if ($students)
        <h4>Estudiantes</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>
                            <!-- Campo de nota -->
                            <input type="number" name="grades[{{ $student->id }}][grade]" step="0.01" min="0" max="10" class="form-control" placeholder="Nota">
                            <!-- Campo oculto para enviar el student_id -->
                            <input type="hidden" name="grades[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
