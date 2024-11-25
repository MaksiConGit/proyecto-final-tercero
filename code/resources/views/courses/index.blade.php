<x-template-layout>
    <div class="container">
        <!-- Tabla con lista de Cursos -->
        <x-table>

            <x-slot name="titulo_tabla">Lista de Cursos</x-slot>

            <x-slot name="table_head">
                <thead>
                    <tr>
                        <th>Cursos</th>
                        <th>Canridad de Alumnos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </x-slot>
            <x-slot name="table_body">
                <tbody class="table-borde-bottom-0">
                    @foreach ($courses as $course)
                        <tr class="table-hover-row">
                            <!-- Columna de Cursos -->
                            <td>
                                <a> 4A</a>
                            </td>
                            <!-- Cantidad de Alumnos -->
                            <td>
                                <a> 20</a>
                            </td>
                            <td>
                                <!-- Aca iria las opciones eliminar y editar -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-slot>
        </x-table>

        <x-floating-icon-courses></x-floating-icon-courses>
    </x-template-layout>


{{-- <x-template-layout>
    <div class="container">
        <h1>Cursos</h1>
        <a href="{{ route('courses.create') }}">create</a>
        <ul>
            @foreach ($courses as $course)
                <li><a href="{{ route('courses.show', [$course]) }}"> {{ $course->course_number }}°
                        {{ $course->section }}</a></li>
            @endforeach
        </ul>
        <hr>
        <h4>Cursos Eliminadas</h4>
        <ul>
            @foreach ($trashed as $trash)
                <li>{{ $trash->course_number . '° ' . $trash->section }}</li>
            @endforeach
        </ul>
    </div>

    <x-floating-icon-courses></x-floating-icon-courses>
</x-template-layout> --}}
