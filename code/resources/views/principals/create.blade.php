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
            <h1>Formulario de Creación de Directivos</h1>
            <div>
                <label for="institution">* Institution:</label>
                <select name="institution" required>
                    <option value="">Selecciona una institución</option>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach
                </select>
            </div>

            <label>
                * name:
                <input type="text" name="name" value="{{ old('name') }}" required />
            </label>
            <br>
            <label>
                * lastname:
                <input type="text" name="lastname" value="{{ old('lastname') }}" required />
            </label>
            <br>
            <label>
                * email:
                <input type="email" name="email" value="{{ old('email') }}" required />
            </label>
            <br>
            <label>
                * dni:
                <input type="text" name="dni" value="{{ old('dni') }}" required />
            </label>
            <br>
            <label>
                * phone:
                <input type="text" name="phone" value="{{ old('phone') }}" required />
            </label>
            <br>
            <label>
                * birthdate:
                <input type="date" name="birthdate" value="{{ old('birthdate') }}" required />
            </label>
            <br>

            @livewire('DependantSelectCity')

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </div>
            <button type="submit"> create </button>
        </form>
    </body>

</x-app-layout>
