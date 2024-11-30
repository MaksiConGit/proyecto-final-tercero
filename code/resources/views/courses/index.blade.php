<x-template-layout>
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-2 mb-4">
                    <a href="{{ route('courses.show', [$course->id]) }}">
                        <x-card-text>
                            <x-slot name="titulo">{{$course->course_number}}°{{$course->section}}</x-slot>
                            <x-slot name="subtitulo">{{$course->institution->name}}</x-slot>
                            <x-slot name="texto">{{$course->career->name}}</x-slot>
                        </x-card-text>
                    </a>
                </div>
            @endforeach
        </div>
        <x-floating-icon>
            <x-slot name="url">{{ route('courses.create') }}</x-slot>
        </x-floating-icon>
</x-template-layout>