{{-- <x-template-layout>

    <div class="card mx-4 p-4">
        <h5>Formulario de Creacion de Usuario</h5>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('users.store')}}">
            @csrf
            @method('PUT')
            <label>
                Nombre:
                <input type="text" name="name" value="{{old('name') }}"  required />
            </label>
            <br>
            <br>
            <label>
                Email:
                <input type="text" name="email" value="{{old('email') }}"  required />
            </label>
            <br>
            <br>
            <label>
                Contraseña:
                <input type="text" name="password" value="{{old('password') }}"  required />
            </label>
            <br>
            <br>
            <label>
                role_id:
                <input type="text" name="role_id" value="{{old('role_id') }}"  required />
            </label>
            <br>
            <br>
            <label>
                institution_id:
                <input type="text" name="institution_id" value="{{old('institution_id') }}"  required />
            </label>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{route('users.index')}}" class="btn btn-secondary">Volver</a>
        </form>
    </div>

</x-template-layout> --}}

<h2>No deberías estar aquí</h2>