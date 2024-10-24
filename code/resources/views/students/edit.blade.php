<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de Edición de Estudiantes</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <label>
            name:
            <input type="text" name="name" value="{{ old('name', $student->name) }}" required />
        </label>
        <br>
        <label>
            lastname:
            <input type="text" name="lastname" value="{{ old('lastname', $student->lastname) }}" required />
        </label>
        <br>
        <label>
            dni:
            <input type="text" name="dni" value="{{ old('dni', $student->dni) }}" required />
        </label>
        <br>
        <label>
            phone:
            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" required />
        </label>
        <br>
        <label>
            birthdate:
            <input type="date" name="birthdate" value="{{ old('birthdate', $student->birthdate) }}" required />
        </label>
        <br>
        <label>
            city_id:

            <select id="city_id" name="city_id" required>
                <option value="">Selecciona una ciudad</option>

                {{-- Mostrar la ciudad actual del estudiante --}}
                @if ($student->city)
                    <option value="{{ $student->city->id }}" selected>
                        {{ $student->city->name }} (Actual)
                    </option>
                @endif
                {{-- Mostrar la ciudades restantes y no repite la ciudad actual del estudiante --}}
                @foreach ($cities as $city)
                    @if ($city->id != $student->city_id)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </label>
        <br>
        <label>
            (opcional) user_id:
            <select id="user_id" name="user_id">
                <option value="">Selecciona una cuenta de usuario libre</option>

                {{-- Mostrar el usuario ya asignado al estudiante si existe --}}
                @if ($student->user)
                    <option value="{{ $student->user->id }}" selected>
                        {{ $student->user->name }} (Actual)
                    </option>
                @endif


                {{-- Mostrar los usuarios libres --}}
                @foreach ($studentsThatHasNoUser as $user)
                    {{-- Verifica que user no sea null --}}
                    @if ($user)
                        <option value="{{ $user->id }}" {{-- Verifica que exista un user dentro de student.
                            (Esto es para evitar una dato fantasma cuando a un student se le asigna una user_id y luego esa user_id es borrada) --}}
                            {{ old('user_id', isset($student->user) ? $student->user->id : null) == $user->id ? 'selected' : '' }}>

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
