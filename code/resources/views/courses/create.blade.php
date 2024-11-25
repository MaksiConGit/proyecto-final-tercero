{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Creación de Cursos</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('courses.store')}}">
        @csrf
        <label>
            course_number:
            <input type="text" name="course_number" value="{{old('course_number') }}"  required />
        </label>
        <br>
        <label>
            section:
            <input type="text" name="section" value="{{old('section') }}"  required />
        </label>
        <br>
        <label>
            career:
            <select id="career_id" name="career_id" required>
                <option value="">Selecciona una Carrera</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                @endforeach
            </select>
        </label>

        </div>
        <button type="submit"> create </button>
    </form>
</body>
</html> --}}

<x-template-layout>

    <div class="card mx-4 p-4">
        <h5>Formulario de Creacion de Cursos</h5>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('courses.store')}}">
            @csrf
            @method('PUT')
            <label>
                Nombre
                <input type="text" name="name" value="{{old('name') }}"  required />
            </label>
            <br>
            <br>
            <label>
                seccion:
                <input type="text" name="section" value="{{old('section') }}"  required />
            </label>
            <br>
            <br>
            <label>
                Carrera:
                <select id="career_id" name="career_id" required>
                    <option value="">Selecciona una Carrera</option>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @endforeach
                </select>
            </label>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{route('courses.index')}}" class="btn btn-secondary">Volver</a>
        </form>
    </div>

</x-template-layout>