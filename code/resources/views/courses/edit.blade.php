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
    <form method="POST" action="{{route('courses.update', $course)}}">
        @csrf
        @method('PUT')

        <label>
            course_number:
            <input type="text" name="course_number" value="{{old('course_number', $course->course_number) }}" required />
        </label>
        <br>
        <label>
            section:
            <input type="text" name="section" value="{{old('section', $course->section) }}" required />
        </label>
        <br>
        <label>
            career:
            <select id="career_id" name="career_id" required>
                @foreach ($careers as $career)
                    <option value="{{ $career->id }}"
                        {{ $career->id == $course->career->id ? 'selected' : '' }}>
                        {{ $career->name }}
                    </option>
                @endforeach
            </select>
        </label>
        </div>
        <button type="submit"> update </button>
    </form>
</body>
</html>