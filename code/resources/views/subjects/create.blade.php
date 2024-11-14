<x-template-layout>
    
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Crear materia</x-slot>
            <x-slot name="action">{{route('subjects.store')}}</x-slot>
            <x-slot name="method"></x-slot>
            <x-slot name="input1"><input
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
    