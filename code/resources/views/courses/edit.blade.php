<x-template-layout>
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar curso</x-slot>
            <x-slot name="action">{{route('courses.update', $course)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-select>
                    <x-slot name="titulo">Institución</x-slot>
                    <x-slot name="name">institution_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una institutión</option>
                        @foreach ($institutions as $institution)
                            <option {{ $institution->id == $course->institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Carrera</x-slot>
                    <x-slot name="name">career_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una carrera</option>
                        @foreach ($careers as $career)
                            <option {{ $career->id == $course->career->id ? 'selected' : '' }} value="{{$career->id}}">{{$career->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Año</x-slot>
                    <x-slot name="name">course_number</x-slot>
                    <x-slot name="placeholder">1</x-slot>
                    <x-slot name="value">{{ old('course_number', $course->course_number) }}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">División</x-slot>
                    <x-slot name="name">section</x-slot>
                    <x-slot name="placeholder">A</x-slot>
                    <x-slot name="value">{{ old('section', $course->section) }}</x-slot>
                </x-input-text>
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere editar esta carrera?</x-slot>
                    <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{route('courses.index')}}</x-slot>
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