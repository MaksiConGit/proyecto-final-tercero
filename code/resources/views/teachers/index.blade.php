<x-app-layout>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1><strong>Lista de profesores</strong></h1>
    @can('teachers.create')
        <a href="{{ route('teachers.create') }}">create ></a>
    @endcan
    
    <ul>
        @foreach ($teachers as $teacher)
            <li><a href="{{ route('teachers.show', [$teacher]) }}"> {{ $teacher->name . ' ' . $teacher->lastname }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Profesores Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{ $trash->name . ' ' . $trash->lastname }}</li>
        @endforeach
    </ul>
</body>

</x-app-layout>

