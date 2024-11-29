<x-app-layout>

    <body>


        <form method="POST" action="{{ route('principals.update', $principal) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="institution">Institution:</label>
                <select name="institution">
                    <option value="">Selecciona una institución</option>

                    @if ($principal->user->institution)
                        <option value="{{ $principal->user->institution->id }}" selected>
                            {{ $principal->user->institution->name }} (Actual)
                        </option>
                    @endif

                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach


                </select>
            </div>
            <h1>Formulario de Edición de Directivos</h1>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <label>
                name:
                <input type="text" name="name" value="{{ old('name', $principal->name) }}" required />
            </label>
            <br>
            <label>
                lastname:
                <input type="text" name="lastname" value="{{ old('lastname', $principal->lastname) }}" required />
            </label>
            <br>
            <label>
                dni:
                <input type="text" name="dni" value="{{ old('dni', $principal->dni) }}" required />
            </label>
            <br>
            <label>
                phone:
                <input type="text" name="phone" value="{{ old('phone', $principal->phone) }}" required />
            </label>
            <br>
            <label>
                birthdate:
                <input type="date" name="birthdate" value="{{ old('birthdate', $principal->birthdate) }}"
                    required />
            </label>
            <br>

            @livewire('DependantSelectCity', ['selectedCity' => $principal->city_id])

            <br>
            <label>
                (opcional) user_id:
                <select id="user_id" name="user_id">
                    <option value="">Selecciona una cuenta de usuario libre</option>

                    {{-- Mostrar el usuario ya asignado al profesor si existe --}}
                    @if ($principal->user)
                        <option value="{{ $principal->user->id }}" selected>
                            {{ $principal->user->name }} (Actual)
                        </option>
                    @endif


                    {{-- Mostrar los usuarios libres --}}
                    @foreach ($availableUserID as $user)
                        {{-- Verifica que user no sea null --}}
                        @if ($user)
                            <option value="{{ $user->id }}" {{-- Verifica que exista un user dentro de principal.
                            (Esto es para evitar una dato fantasma cuando a un principal se le asigna una user_id y luego esa user_id es borrada) --}}
                                {{ old('user_id', isset($principal->user) ? $principal->user->id : null) == $user->id ? 'selected' : '' }}>

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
