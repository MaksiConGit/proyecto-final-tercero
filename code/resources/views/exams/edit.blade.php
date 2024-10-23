<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de Edición de Exámenes</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('exams.update', $exam) }}">
        @csrf
        @method('PUT')
        <label>
            Número:
            <input type="text" name="number" value="{{ old('number', $exam->number) }}" required />
        </label>
        <br>
        <label>
            Profesor:
            <select id="teacher_id" name="teacher_id" required >
                <option value="">Selecciona un profesor</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : ''}}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            Materia:
            <select id="subject_id" name="subject_id" required>
                <option value="">Selecciona una materia</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"  {{ old('subject_id') == $subject->id ? 'selected' : ''}}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            Fecha:
            <input type="text" name="date" value="{{ old('date', $exam->date) }}" required />
        </label>
        <br>
        </div>
        <button type="submit"> update </button>
    </form>
</body>

</html>
