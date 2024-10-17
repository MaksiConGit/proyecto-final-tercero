<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Creación de Carreras</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('careers.store')}}">
        @csrf
        <label>
            name:
            <input type="text" name="name" value="{{old('name') }}"  required />
        </label>
        <br>
        <label>
            institution:
            <select id="institution_id" name="institution_id" required>
                <option value="">Selecciona una Institución</option>
                @foreach($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                @endforeach
            </select>
        </label>

        </div>
        <button type="submit"> create </button>
    </form>
</body>
</html>