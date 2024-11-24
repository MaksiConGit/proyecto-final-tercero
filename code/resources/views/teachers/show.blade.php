<x-app-layout>

<body>
    <h1>Profesor: {{ $teacher->name }}</h1>
    <ul>
        <li>DNI: {{ $teacher->dni }}</li>
        <li>Phone: {{ $teacher->phone }}</li>
        <li>Birhtdate: {{ $teacher->birthdate }}</li>
        <li>Country: {{ $teacher->city->province->country->name }}</li>
        <li>Province: {{ $teacher->city->province->name }}</li>
        <li>City: {{ $teacher->city->name }}</li>
        <li>
            @if ($teacher->user)
                User: {{ $teacher->user->name }}
            @else
                No tiene usuario asignado.
            @endif
        </li>
    </ul>

    <h2>Institucion: {{ $teacher->user->institution->name }}</h2>

    <hr>
    
    @can('teachers.edit')
        <a href="{{ route('teachers.edit', $teacher) }}">Edit ></a>
    @endcan

    @can('teachers.destroy')
        <form method="POST" action="{{ route('teachers.destroy', $teacher) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete ></button>
        </form>
    @endcan

</body>

</x-app-layout>
