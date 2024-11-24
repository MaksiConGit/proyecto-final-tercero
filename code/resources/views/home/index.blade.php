<x-app-layout>

    <h1><strong>Institución: {{ $institution->name }}</strong></h1>

    <a href="{{route('careers.create')}}">Añadir Carrera ></a>

    <hr>

    <h2>Carreras:</h2>
    <ul>
        @foreach ($careers as $career)
            <li><strong><a href="{{ route('careers.show', [$career]) }}">{{ $career->name }} ></a></strong></li>
        @endforeach
    </ul>
</x-app-layout>
