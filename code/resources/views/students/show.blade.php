<x-template-layout>
    
    {{-- <div class="container">
        <h1>Profesor: {{ $student->name }}</h1>
        <ul>
            <li>DNI: {{ $student->dni }}</li>
            <li>Phone: {{ $student->phone }}</li>
            <li>Birhtdate: {{ $student->birthdate }}</li>
            <li>City: {{ $student->city ? $student->city->name : 'Sin ciudad asignada.' }}</li>
            <li>
                @if ($student->user)
                    User: {{ $student->user->name }}
                @else
                    No tiene usuario asignado.
                @endif
            </li>
        </ul>
        <a href="{{ route('students.edit', $student) }}">Edit</a>

        <form method="POST" action="{{ route('students.destroy', $student) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div> --}}

<x-account-settings>
</x-account-settings>
</x-template-layout>