<x-app-layout>

    <body>
        <h1><strong>Materia: {{ $subject->name }}</strong></h1>
        
        <hr>
        <h2>Profesores</h2>
        <table>
            <tr>
                <th>Nombre completo del profesor</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
            
                @foreach ($subject->teachers as $teacher)
                <tr>
                    <td>{{$teacher->name . " " . $teacher->lastname}}</td>
                    <td><a href="">{{$teacher->user->name}} ></a></td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject) }}">Edit ></a>

                        <form method="POST" action="{{ route('subjects.destroy', $subject) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete ></button>
                        </form>
                    </td>
                </tr>
                @endforeach

        </table>
        <hr>
        <h2>Profesores</h2>
    </body>
</x-app-layout>
