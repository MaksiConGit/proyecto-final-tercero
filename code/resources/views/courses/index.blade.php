<x-template-layout>
    <div class="container">
        <h1>Cursos</h1>
        <a href="{{ route('courses.create') }}">create</a>
        <ul>
            @foreach ($courses as $course)
                <li><a href="{{ route('courses.show', [$course]) }}"> {{ $course->course_number }}°
                        {{ $course->section }}</a></li>
            @endforeach
        </ul>
        <hr>
        <h4>Cursos Eliminadas</h4>
        <ul>
            @foreach ($trashed as $trash)
                <li>{{ $trash->course_number . '° ' . $trash->section }}</li>
            @endforeach
        </ul>
    </div>

    <x-floating-icon></x-floating-icon>
</x-template-layout>
