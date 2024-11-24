<x-app-layout>

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
        </div>
        <button type="submit"> create </button>
    </form>
</body>
    
</x-app-layout>