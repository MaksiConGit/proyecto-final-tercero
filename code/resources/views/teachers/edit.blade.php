<x-app-layout>

<body>
    <h1>Formulario de Edición de Profesores</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('teachers.update', $teacher) }}">
        @csrf
        @method('PUT')
        <label>
            name:
            <input type="text" name="name" value="{{ old('name', $teacher->name) }}" required />
        </label>
        <br>
        <label>
            lastname:
            <input type="text" name="lastname" value="{{ old('lastname', $teacher->lastname) }}" required />
        </label>
        <br>
        <label>
            dni:
            <input type="text" name="dni" value="{{ old('dni', $teacher->dni) }}" required />
        </label>
        <br>
        <label>
            phone:
            <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}" required />
        </label>
        <br>
        <label>
            birthdate:
            <input type="date" name="birthdate" value="{{ old('birthdate', $teacher->birthdate) }}" required />
        </label>
        <br>

        @livewire('DependantSelectCity', ['selectedCity' => $teacher->city_id])

        <br>
        <label>
            (opcional) user_id:
            <select id="user_id" name="user_id">
                <option value="">Selecciona una cuenta de usuario libre</option>

                {{-- Mostrar el usuario ya asignado al profesor si existe --}}
                @if ($teacher->user)
                    <option value="{{ $teacher->user->id }}" selected>
                        {{ $teacher->user->name }} (Actual)
                    </option>
                @endif


                {{-- Mostrar los usuarios libres --}}
                @foreach ($teachersThatHasNoUser as $user)
                    {{-- Verifica que user no sea null --}}
                    @if ($user)
                        <option value="{{ $user->id }}" {{-- Verifica que exista un user dentro de teacher.
                            (Esto es para evitar una dato fantasma cuando a un teacher se le asigna una user_id y luego esa user_id es borrada) --}}
                            {{ old('user_id', isset($teacher->user) ? $teacher->user->id : null) == $user->id ? 'selected' : '' }}>

                            {{ $user->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </label>
        <br>
        </div>
        <button type="submit"> update </button>
    </form>
</body>

</x-app-layout>

