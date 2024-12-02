<x-template-layout>
    <div class="container">
        <x-icon-dropdown>
            <x-slot name="titulo">Directivo: {{$principal->name . " " . $principal->lastname}}</x-slot>
            <x-slot name="subtitulo"><p class="mb-4" style="white-space: nowrap;"></p></x-slot>
            <x-slot name="url_editar">{{route('principals.edit', $principal)}}</x-slot>
            <x-slot name="url_eliminar">{{route('principals.destroy', $principal)}}</x-slot>
        </x-icon-dropdown>
        <ul>
            <li>Email: {{ $principal->user->email }}</li>
            <li>DNI: {{ $principal->dni }}</li>
            <li>Phone: {{ $principal->phone }}</li>
            <li>Birhtdate: {{ $principal->birthdate }}</li>
            <li>City: {{ $principal->city ? $principal->city->name : 'Sin ciudad asignada.' }}</li>
            <li>
                @if ($principal->user)
                    User: {{ $principal->user->name }}
                @else
                    No tiene usuario asignado.
                @endif
            </li>
        </ul>
    </div>
</x-template-layout>