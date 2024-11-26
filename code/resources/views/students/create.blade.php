<x-app-layout>

    <body>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('students.store') }}">
            <h1>Inscripción</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @livewire('CheckboxCourses')

            <hr>

            <h2>Formulario de Datos del Estudiante</h2>
            @csrf
            <label for="name">name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required />
            <br>

            <label for="lastname">lastname:</label>
            <input type="text" name="lastname" value="{{ old('lastname') }}" required />
            <br>

            <label for="dni">dni:</label>
            <input type="text" name="dni" value="{{ old('dni') }}" required />
            <br>

            <label for="phone">phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required />
            <br>

            <label for="birthdate">birthdate:</label>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" required />

            <br>

            @livewire('DependantSelectCity')

            <br>
            <label for="user_id">(opcional) user_id:</label>

            <select id="user_id" name="user_id">
                <option value="">Selecciona una cuenta de usuario libre</option>
                @foreach ($availableUserID as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>

            <br>
            </div>
            <button type="submit"> create </button>
        </form>
    </body>

</x-app-layout>
