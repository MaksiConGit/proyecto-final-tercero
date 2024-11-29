<x-app-layout>

    <body>

        <form method="POST" action="{{ route('principals.store') }}">
            @csrf

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div>
                <label for="institution">Institution:</label>
                <select name="institution">
                    <option value="">Selecciona una institución</option>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach
                </select>
            </div>
            <h1>Formulario de Datos de Directivos</h1>

            <label>
                name:
                <input type="text" name="name" value="{{ old('name') }}" required />
            </label>
            <br>
            <label>
                lastname:
                <input type="text" name="lastname" value="{{ old('lastname') }}" required />
            </label>
            <br>
            <label>
                dni:
                <input type="text" name="dni" value="{{ old('dni') }}" required />
            </label>
            <br>
            <label>
                phone:
                <input type="text" name="phone" value="{{ old('phone') }}" required />
            </label>
            <br>
            <label>
                birthdate:
                <input type="date" name="birthdate" value="{{ old('birthdate') }}" required />
            </label>
            <br>

            @livewire('DependantSelectCity')


            <br>
            <label>
                (opcional) user_id:
                <select id="user_id" name="user_id">
                    <option value="">Selecciona una cuenta de usuario libre</option>
                    @foreach ($availableUserID as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </label>
            <br>
            </div>
            <button type="submit"> create </button>
        </form>
    </body>

</x-app-layout>
