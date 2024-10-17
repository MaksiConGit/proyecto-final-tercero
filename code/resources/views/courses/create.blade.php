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