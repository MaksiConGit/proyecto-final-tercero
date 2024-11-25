{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Creación de Usuarios</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('users.store')}}">
        @csrf
        <label>
            name:
            <input type="text" name="name" value="{{old('name') }}"  required />
        </label>
        <br>
        <label>
            email:
            <input type="text" name="email" value="{{old('email') }}"  required />
        </label>
        <br>
        <label>
            password:
            <input type="text" name="password" value="{{old('password') }}"  required />
        </label>
        <br>
        <label>
            role_id:
            <input type="text" name="role_id" value="{{old('role_id') }}"  required />
        </label>
        <br>
        <label>
            institution_id:
            <input type="text" name="institution_id" value="{{old('institution_id') }}"  required />
        </label>
        <br>
        </div>
        <button type="submit"> create </button>
    </form>
</body>
</html> --}}

<x-template-layout>

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
</x-template-layout>
