{{-- <!DOCTYPE html>
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
            <select id="teacher_id" name="teacher_id" required>
                <option value="" disabled {{ old('teacher_id', $exam->teacherSubject->teacher->id ?? null) ? '' : 'selected' }}>
                    Seleccione un profesor
                </option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}"
                        {{ old('teacher_id', $exam->teacherSubject->teacher->id ?? null) == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }} {{ $teacher->lastname }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            Materia:
            <select id="subject_id" name="subject_id" required>
                <option value="" disabled {{ old('subject_id', $exam->teacherSubject->subject->id ?? null) ? '' : 'selected' }}>
                    Seleccione una materia
                </option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        {{ old('subject_id', $exam->teacherSubject->subject->id) == $subject->id ? 'selected' : ''}}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            Fecha:
            <input type="date" name="date" value="{{ old('date', $exam->date) }}" required />
        </label>
        <br>
        </div>
        <button type="submit"> update </button>
    </form>
</body>

</html> --}}


<x-template-layout>
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Exámenes /</span> Editar Examen
        </h4>
        <x-form-horizontal-icon>
            <x-slot name="titulo">Crear examen</x-slot>
            <x-slot name="action">{{route('exams.update', $exam)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-select>
                    <x-slot name="titulo">Institución</x-slot>
                    <x-slot name="name">institution_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una institución</option>
                        @foreach ($institutions as $institution)
                            <option {{ old('institution_id') == $institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Carrera</x-slot>
                    <x-slot name="name">career_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una carrera</option>
                        @foreach ($careers as $career)
                            <option {{ old('career_id') == $career->id ? 'selected' : '' }} value="{{$career->id}}">{{$career->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Curso</x-slot>
                    <x-slot name="name">course_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una curso</option>
                        @foreach ($courses as $course)
                            <option {{ old('course_id') == $course->id ? 'selected' : '' }} value="{{$course->id}}">{{$course->course_number}}°{{$course->section}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Materia</x-slot>
                    <x-slot name="name">subject_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una materia</option>
                        @foreach ($subjects as $subject)
                            {{-- <option {{ old('subject_id') == $subject->id ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->name}}</option> --}}
                            <option {{ $subject->id == $exam->subject->id ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Profesor</x-slot>
                    <x-slot name="name">teacher_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione un profesor</option>
                        @foreach ($teachers as $teacher)
                            {{-- <option {{ old('teacher_id') == $teacher->id ? 'selected' : '' }} value="{{$teacher->id}}">{{$teacher->name}}</option> --}}
                            <option {{ $teacher->id == $exam->teacher->id ? 'selected' : '' }} value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Número</x-slot>
                    <x-slot name="name">number</x-slot>
                    <x-slot name="placeholder">1</x-slot>
                    <x-slot name="value">{{ old('number', $exam->number) }}</x-slot>
                </x-input-text>
                <x-input-date>
                    <x-slot name="titulo">Fecha</x-slot>
                    <x-slot name="name">date</x-slot>
                    <x-slot name="value">{{ old('date', $exam->date) }}</x-slot>
                </x-input-date>
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere crear esta carrera?</x-slot>
                    <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{route('exams.index')}}</x-slot>
        </x-form-horizontal-icon>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>    
            @endforeach
        </ul>
        @endif
    </div>
</x-template-layout>