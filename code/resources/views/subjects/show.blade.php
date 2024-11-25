<x-template-layout>

    <div class="container">

        <div class="col-md-6 col-lg-8 mb-3">
            <x-card>
                <x-slot name="objeto">{{$subject->id}}</x-slot>
                <x-slot name="titulo"></x-slot>
                <x-slot name="subtitulo"></x-slot>
                <x-slot name="img">
                    <img class="card-img-top" src="../template_files/assets/img/reyo/programacion-2-e1551291144973.jpg" alt="materia" />
                </x-slot>
                <x-slot name="texto">
                    <x-icon-dropdown>
                        <x-slot name="titulo">{{$subject->name}}</x-slot>
                        <x-slot name="subtitulo"></x-slot>
                        <x-slot name="url_editar">{{route('subjects.edit', $subject)}}</x-slot>
                        <x-slot name="url_eliminar">{{route('subjects.destroy', $subject)}}</x-slot>
                    </x-icon-dropdown>
                </x-slot>
                <x-slot name="footer"></x-slot>
            </x-card>
            
        </div>

        <div class="col-md-6 col-lg-8 mb-3">
            <x-card>
                <x-slot name="objeto">{{$subject->id}}</x-slot>
                <x-slot name="titulo">
                    <x-user></x-user>
                </x-slot>
                <x-slot name="img"></x-slot>
                <x-slot name="texto">Buenas noches, para los que no acceden a promoción y vienen a rendir en instancia de regulares.Para el día del examen deben venir a defender el trabajo, previamente corregido y mostrado su funcionamiento.
                    Alta, baja y modificación de profesores.
                    Alta, baja y modificación de alumnos.
                    Alta, baja y modificación de materias.
                    Dashboard de ingreso con información que consideren relevante (alumnos registrados, docentes registrados, materias registradas, etc)
                    Cada formulario, debe permitir generar las relaciones correspondientes, es decir que al dar de alta un profesor, me debe dejar asignarlo a una materia; cada alumno me debe permitir asignarlo a muchas materias, etc.
                    Pueden utilizar templates para el frontend.
                    + TEORÍA DE TODO EL AÑO.
                    Cualquier duda, consulten.</x-slot>
                <x-slot name="footer">
                    <div class="card-footer">
                        <x-search></x-search>
                    </div>
                </x-slot>
            </x-card> 
        </div>



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
                            <x-slot name="fila_url">{{route('teachers.show', [$teacherSubject->teacher])}}</x-slot>
                            <x-slot name="nombre">{{$teacherSubject->teacher->name}}</x-slot>
                            <x-slot name="apellido">{{$teacherSubject->teacher->lastname}}</x-slot>
                            <x-slot name="nombre_usuario">{{$teacherSubject->teacher->user->name}}</x-slot>
                            <x-slot name="usuario">
                                <x-td-user>
                                    <x-slot name="nombre_usuario">{{ $teacherSubject->teacher->user->name }}</x-slot>
                                    <x-slot name="usuario_url">{{ route('users.edit', [$teacherSubject->teacher->user->id]) }}</x-slot>
                                </x-td-user>
                            </x-slot>                            <x-slot name="rol">{{$teacherSubject->teacher->user->role->name}}</x-slot>
                            <x-slot name="editar_url">{{route('teachers.edit', [$teacherSubject->teacher])}}</x-slot>
                        </x-table-item>

                    @endforeach

                </tbody>
            </x-slot>

        </x-table>
        @else
            No tiene profesor asignado.
        @endif
        

    </div>

    <x-floating-icon>
        <x-slot name="url">{{route('subjects.create')}}</x-slot>
    </x-floating-icon>
</x-template-layout>

