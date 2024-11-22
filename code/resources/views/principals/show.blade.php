<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Directivo: {{ $principal->name . " " . $principal->lastname}}</h1>
    <ul>
        <li>DNI: {{ $principal->dni }}</li>
        <li>Phone: {{ $principal->phone }}</li>
        <li>Birhtdate: {{ $principal->birthdate }}</li>
        <li>Country: {{ $principal->city->province->country->name }}</li>
        <li>Province: {{ $principal->city->province->name }}</li>
        <li>City: {{ $principal->city->name }}</li>
        <li>
            @if ($principal->user)
                User: {{ $principal->user->name }}
            @else
                No tiene usuario asignado.
            @endif
        </li>
    </ul>

    <h2>Institucion: {{ $principal->user->institution->name }}</h2>

    <a href="{{ route('principals.edit', $principal) }}">Edit</a>

    <form method="POST" action="{{ route('principals.destroy', $principal) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
