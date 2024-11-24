<x-app-layout>

<body>
    <h1>Formulario de Edicion</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{route('careers.update', $career)}}">
        @csrf
        @method('PUT')

        <label>
            name:
            <input type="text" name="name" value="{{ old('name', $career->name) }}" required />
        </label>
        <br>
        </div>
        <button type="submit"> update </button>
    </form>
</body>
</x-app-layout>