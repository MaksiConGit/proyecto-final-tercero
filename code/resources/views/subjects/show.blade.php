<x-template-layout>

    <div class="container">
        <x-icon-dropdown>
            <x-slot name="titulo">{{$subject->name}}</x-slot>
            <x-slot name="url_editar">{{route('subjects.edit', $subject)}}</x-slot>
            <x-slot name="url_eliminar">{{route('subjects.destroy', $subject)}}</x-slot>
        </x-icon-dropdown>
        
        @if ($subject->teacherSubject->isNotEmpty())
        <x-table>

            <x-slot name="titulo_tabla">Profesores</x-slot>

            <x-slot name="table_head">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
            </x-slot>

            <x-slot name="table_body">
                <tbody class="table-borde-bottom-0">

                    @foreach ($subject->teacherSubject as $teacherSubject)

                        <x-table-item>
                            <x-slot name="profesor_url">{{route('teachers.show', [$teacherSubject->teacher])}}</x-slot>
                            <x-slot name="nombre">{{$teacherSubject->teacher->name}}</x-slot>
                            <x-slot name="apellido">{{$teacherSubject->teacher->lastname}}</x-slot>
                            <x-slot name="nombre_usuario">{{$teacherSubject->teacher->user->name}}</x-slot>
                            <x-slot name="usuario_url">{{route('users.show', [$teacherSubject->teacher->user])}}</x-slot>
                            <x-slot name="rol">{{$teacherSubject->teacher->user->role->name}}</x-slot>
                            <x-slot name="editar_profesor_url">{{route('teachers.edit', [$teacherSubject->teacher])}}</x-slot>
                        </x-table-item>

                    @endforeach

                </tbody>
            </x-slot>

        </x-table>
        @else
            No tiene profesor asignado.
        @endif
        

    </div>

    <x-floating-icon></x-floating-icon>
</x-template-layout>

