<x-app-layout>

    <body>
        <h1>Formulario de Creación de Cursos</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('courses.store') }}">
            @csrf
            <label>
                career:
                <select id="career_id" name="career_id" required>
                    @foreach ($careers as $careerOptions)
                        <option value="{{ $careerOptions->id }}"
                            {{ $careerOptions->id == $career->id ? 'selected' : '' }}>
                            {{ $careerOptions->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <br>
            <label>
                course_number:
                <input type="text" name="course_number" value="{{ old('course_number') }}" required />
            </label>
            <br>
            <label>
                section:
                <input type="text" name="section" value="{{ old('section') }}" required />
            </label>
            <br>

            </div>
            <button type="submit"> create </button>
        </form>
    </body>
</x-app-layout>
