<x-template-layout>
    
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Crear carrera</x-slot>
            <x-slot name="action">{{route('careers.store')}}</x-slot>
            <x-slot name="method"></x-slot>
            <x-slot name="input"><input
                type="text"
                name="name"
                class="form-control"
                id="basic-icon-default-fullname"
                placeholder="Matemática"
                aria-label="Matemática"
                aria-describedby="basic-icon-default-fullname2"
              /></x-slot>
        </x-form-horizontal-icon>
    </div>

{{-- 
    <div class="container">
    <h1>Formulario de Creación de Materia</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('subjects.store')}}">
        @csrf
        <label>
            name:
            <input type="text" name="name" value="{{old('name') }}"  required />
        </label>

        </div>
        <button type="submit"> create </button>
    </form>
    </div> --}}

</x-template-layout>
    


{{-- <h1>Formulario de Creación de Carreras</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>    
        @endforeach
    </ul>
@endif
<form method="POST" action="{{route('careers.store')}}">
    @csrf
    <label>
        name:
        <input type="text" name="name" value="{{old('name') }}"  required />
    </label>
    <br>
    <label>
        institution:
        <select id="institution_id" name="institution_id" required>
            <option value="">Selecciona una Institución</option>
            @foreach($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
    </label>

    </div>
    <button type="submit"> create </button>
</form> --}}