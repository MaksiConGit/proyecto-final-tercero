<x-template-layout>
    <div class="container">
        <x-form-horizontal-icon>
            <x-slot name="titulo">Editar materia</x-slot>
            <x-slot name="action">{{route('subjects.update', $subject)}}</x-slot>
            <x-slot name="method">@method('PUT')</x-slot>
            <x-slot name="input1">
                <input
                type="text"
                name="name"
                class="form-control"
                id="basic-icon-default-fullname"
                placeholder="Matemática"
                aria-label="Matemática"
                aria-describedby="basic-icon-default-fullname2"
                value="{{old('name', $subject->name) }}"
                required
              />
            </x-slot>
        </x-form-horizontal-icon>
    </div>
    {{-- <h1>Formulario de Edicion</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('subjects.update', $subject)}}">
        @csrf

        <label>
            name:
            <input type="text" name="name" value="{{old('name', $subject->name) }}" required />
        </label>

        </div>
        <button type="submit"> update </button>
    </form> --}}
</x-template-layout>