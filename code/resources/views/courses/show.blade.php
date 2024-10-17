<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Curso: {{$course->course_number . "° " . $course->section}}</h1>
    <p>Carrera "{{$course->career->name}}"</p>
    <a href="{{route('courses.edit', $course)}}">Edit</a>

    <form method="POST" action="{{route('courses.destroy', $course)}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>