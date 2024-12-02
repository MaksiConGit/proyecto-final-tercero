<x-template-layout>

    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Crear estudiante</x-slot>
            <x-slot name="action">{{route('students.store')}}</x-slot>
            <x-slot name="method"></x-slot>
            <x-slot name="inputs">
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Nombre</x-slot>
                    <x-slot name="name">name</x-slot>
                    <x-slot name="placeholder">Nombre</x-slot>
                    <x-slot name="value">{{old('name')}}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Apellido</x-slot>
                    <x-slot name="name">lastname</x-slot>
                    <x-slot name="placeholder">Apellido</x-slot>
                    <x-slot name="value">{{old('lastname')}}</x-slot>
                </x-input-text>
                <x-input-email>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Correo Electrónico</x-slot>
                    <x-slot name="name">email</x-slot>
                    <x-slot name="placeholder">ejemplo@ejemplo.com</x-slot>
                    <x-slot name="value">{{ old('email') }}</x-slot>
                </x-input-email>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">DNI</x-slot>
                    <x-slot name="name">dni</x-slot>
                    <x-slot name="placeholder">+11 1 1234567890</x-slot>
                    <x-slot name="value">{{old('dni')}}</x-slot>
                </x-input-text>
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Teléfono</x-slot>
                    <x-slot name="name">phone</x-slot>
                    <x-slot name="placeholder">Teléfono</x-slot>
                    <x-slot name="value">{{old('phone')}}</x-slot>
                </x-input-text>
                <x-input-date>
                    <x-slot name="titulo">Fecha de nacimiento</x-slot>
                    <x-slot name="name">birthdate</x-slot>
                    <x-slot name="value">{{old('birthdate')}}</x-slot>
                </x-input-date>
                
                @livewire('CitySelect')

                <hr>
                <h5>Asignar Cursos</h5>
                @livewire('CheckboxCourses')

            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere crear este estudiante?</x-slot>
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