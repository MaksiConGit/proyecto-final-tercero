<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Edicion</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('subjects.update', $subject)}}">
        @csrf
        @method('PUT')

        <label>
            name:
            <input type="text" name="name" value="{{old('name', $subject->name) }}" required />
        </label>

        </div>
        <button type="submit"> update </button>
    </form>
</body>
</html>