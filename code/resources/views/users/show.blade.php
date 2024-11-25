<x-template-layout>
    <div class="card mx-4 p-4">
    <h1>Usuario: {{$user->name}}</h1>
    

    <form method="POST" action="{{route('users.destroy', $user)}}">
        @csrf
        @method('DELETE')
        <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Editar</a>
        <button type="submit" class="btn btn-primary">Eliminar</button>
        <a href="{{route('users.index')}}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</x-template-layout>