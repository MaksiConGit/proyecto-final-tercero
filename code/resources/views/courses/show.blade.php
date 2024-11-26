<x-template-layout>
    <div class="card mx-4 p-4">
    <h1>Curso: {{$course->course_number . "° " . $course->section}}</h1>
    <p>Carrera "{{$course->career->name}}"</p>
    {{-- <a href="{{route('courses.edit', $course)}}">Edit</a> --}}

    <form method="POST" action="{{route('courses.destroy', $course)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Delete</button>
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{route('courses.index')}}" class="btn btn-secondary">Volver</a>
        <br>
        <br>
        <p>Alumnos: <a href="">Joaquin, Lucas, David, Maximiliano, Estefi</a></p>
    </form>
</div>
</x-template-layout>