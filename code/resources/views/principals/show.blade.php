<x-template-layout>
    <div class="container">
        <h1>Directivo: {{ $principal->name }}</h1>
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
        <a href="{{ route('principals.edit', $principal) }}">Edit</a>

        <form method="POST" action="{{ route('principals.destroy', $principal) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-template-layout>