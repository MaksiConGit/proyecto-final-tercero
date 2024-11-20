<x-template-layout>
    
    <div class="d-block m-auto bg-white p-5 pt-3 rounded border border-secondary border-opacity-100">
        <h2 class="mb-4">Lista de Usuarios</h2>
        {{-- <a href="{{ route('users.create') }}">create</a> --}}
        <ul class="list-group">
            @foreach ($users as $user)
                <li class="list-group-item d-flex justify-content-center text-dark fw-semibold"><a href="{{ route('users.show', [$user]) }}"> {{ $user->name }} @if ($user->is_deleted)
                            (borrado)
                        @endif </a></li>
            @endforeach
        </ul>
    </div>

    <x-floating-icon-users></x-floating-icon-users>

    {{-- <hr>
    <h4>Usuarios Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{$trash->name}}</li>
        @endforeach
    </ul> --}}

</x-template-layout>
