<x-app-layout>

<body>
    <h1>Lista de materias</h1>
    <a href="{{route('subjects.create')}}">create</a>
    <ul>
        @foreach ($subjects as $subject)
        <li><a href="{{route('subjects.show', [$subject])}}"> {{$subject->name}}</a></li>
        @endforeach
    </ul>
</body>
    
</x-app-layout>