<x-template-layout>
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar alumno</x-slot>
            <x-slot name="action">{{route('students.update', $student)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Nombre</x-slot>
                    <x-slot name="name">name</x-slot>
                    <x-slot name="placeholder">Nombre</x-slot>
                    <x-slot name="value">{{ old('name', $student->name) }}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Apellido</x-slot>
                    <x-slot name="name">lastname</x-slot>
                    <x-slot name="placeholder">Apellido</x-slot>
                    <x-slot name="value">{{ old('lastname', $student->lastname) }}</x-slot>
                </x-input-text>
                <x-input-email>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Correo Electrónico</x-slot>
                    <x-slot name="name">email</x-slot>
                    <x-slot name="placeholder">ejemplo@ejemplo.com</x-slot>
                    <x-slot name="value">{{ old('email', $student->user->email ?? '') }}</x-slot>
                </x-input-email>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">DNI</x-slot>
                    <x-slot name="name">dni</x-slot>
                    <x-slot name="placeholder">DNI</x-slot>
                    <x-slot name="value">{{old('dni', $student->dni)}}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Teléfono</x-slot>
                    <x-slot name="name">phone</x-slot>
                    <x-slot name="placeholder">Teléfono</x-slot>
                    <x-slot name="value">{{old('phone', $student->phone)}}</x-slot>
                </x-input-text>
                <x-input-date>
                    <x-slot name="titulo">Fecha de nacimiento</x-slot>
                    <x-slot name="name">birthdate</x-slot>
                    <x-slot name="value">{{old('birthdate', $student->birthdate)}}</x-slot>
                </x-input-date>
                <x-input-select>
                    <x-slot name="titulo">Institución del Alumno</x-slot>
                    <x-slot name="name">institution</x-slot>
                    <x-slot name="opciones">
                        <option value="">Selecciona una institución</option>
                        @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}" 
                            @if ($student && $student->user && $student->user->institution_id === $institution->id) selected @endif>
                            {{ $institution->name }} 
                            @if ($student && $student->user && $student->user->institution_id === $institution->id) (Actual) @endif
                        </option>
                        @endforeach
                    </x-slot>
                </x-input-select>

                @livewire('CitySelect', ['selectedCity' => $student->city_id])
                <hr>
                <h5>Asignar Cursos</h5>
                @livewire('CheckboxCourses' , ['student' => $student])
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere editar esta estudiante?</x-slot>
                    <x-slot name="contenido">Los datos se podrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{route('students.index')}}</x-slot>
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