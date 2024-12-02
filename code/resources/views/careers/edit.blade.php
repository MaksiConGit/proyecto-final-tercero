<x-template-layout>
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar carrera</x-slot>
            <x-slot name="action">{{route('careers.update', $career)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="inputs">
                <x-input-text>
                    <x-slot name="icon">bx bx-buildings</x-slot>
                    <x-slot name="titulo">Nombre</x-slot>
                    <x-slot name="name">name</x-slot>
                    <x-slot name="placeholder">Nombre</x-slot>
                    <x-slot name="value">{{ old('name', $career->name) }}</x-slot>
                </x-input-text>
                <x-input-select>
                    <x-slot name="titulo">Institución</x-slot>
                    <x-slot name="name">institution_id</x-slot>
                    <x-slot name="opciones">
                        <option value="" selected hidden>Seleccione una institución</option>
                        @foreach ($institutions as $institution)
                            <option {{ $institution->id == $career->institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                        @endforeach
                    </x-slot>
                </x-input-select>
            </x-slot>
            <x-slot name="modal">
                <x-modal_template>
                    <x-slot name="titulo">¿Estás seguro que quiere editar esta carrera?</x-slot>
                    <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
                </x-modal_template>
            </x-slot>
            <x-slot name="volver_url">{{route('careers.index')}}</x-slot>
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



{{-- <h1>Formulario de Edicion</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>    
        @endforeach
    </ul>
@endif
<form method="POST" action="{{route('careers.update', $career)}}">
    @csrf
    @method('PUT')

    <label>
        name:
        <input type="text" name="name" value="{{ old('name', $career->name) }}" required />
    </label>
    <br>
    <label>
        institution:
        <select id="institution_id" name="institution_id" required>a
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}"
                    {{ $institution->id == $career->institution->id ? 'selected' : '' }}>
                    {{ $institution->name }}
                </option>
            @endforeach
        </select>
    </label>

    </div>
    <button type="submit"> update </button>
</form> --}}
