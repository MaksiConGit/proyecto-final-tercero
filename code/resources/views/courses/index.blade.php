<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cursos</h1>
    <a href="{{route('courses.create')}}">create</a>
    <ul>
        @foreach ($courses as $course)
        <li><a href="{{route('courses.show', [$course])}}"> {{$course->course_number}}° {{$course->section}}</a></li>
        @endforeach
    </ul>
</body>
</html>