<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de Edición de Profesores</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('principals.update', $principal) }}">
        @csrf
        @method('PUT')
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
            <input type="date" name="birthdate" value="{{ old('birthdate', $principal->birthdate) }}" required />
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

</html>
