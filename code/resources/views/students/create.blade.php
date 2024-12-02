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
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">DNI</x-slot>
                    <x-slot name="name">dni</x-slot>
                    <x-slot name="placeholder">DNI</x-slot>
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
                <x-input-select>
                    <x-slot name="titulo">Ciudad</x-slot>
                    <x-slot name="name">city_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una ciudad</option>
                        @foreach ($cities as $city)
                            <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-select>
                    <x-slot name="titulo">Usuario</x-slot>
                    <x-slot name="name">user_id</x-slot>
                    <x-slot name="opciones">
                        <option value="">Selecciona una cuenta de usuario libre</option>
                        {{-- Mostrar los usuarios libres --}}
                        @foreach ($studentsThatHasNoUser as $user)
                            {{-- Verifica que user no sea null --}}
                            @if ($user)
                                <option value="{{ $user->id }}" {{-- Verifica que exista un user dentro de student.
                                    (Esto es para evitar una dato fantasma cuando a un student se le asigna una user_id y luego esa user_id es borrada) --}}
                                    {{ isset($student->user) && $user->id == $student->user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endif
                        @endforeach
                    </x-slot>
                </x-input-select>
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere crear este estudiante?</x-slot>
                    <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
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