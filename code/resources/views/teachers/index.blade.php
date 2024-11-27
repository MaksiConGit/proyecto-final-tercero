<x-template-layout>
    <style>
        .stretched-link {
            z-index: 1;
        }

        .internal-link {
            position: relative;
            z-index: 2;
        }
    </style>
    <div class="container">
        <div class="d-flex flex-column align-items-stretch gap-3">
            @foreach ($teachers as $teacher)
                <div class="row mb-1">
                    <div class="col-md">
                        <div class="card position-relative">
                            <a href="{{ route('teachers.show', [$teacher->id]) }}" class="stretched-link"></a>
                            <div class="row g-8">
                                <div class="col-md-2">
                                    <img class="card-img card-img-left" src="../../template_files/assets/img/elements/12.jpg"
                                        alt="Card image" />
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $teacher->name . ', ' . $teacher->lastname }}</h5>
                                        <p class="card-text">
                                            Materias:
                                            @if ($teacher->subjects->isNotEmpty())
                                                @foreach ($teacher->subjects as $subject)
                                                    <a href="{{ route('subjects.show', [$subject->id]) }}" class="internal-link">
                                                        {{ $subject->name }}
                                                    </a>
                                                @endforeach
                                            @else
                                                Sin asignar.
                                            @endif
                                            <br>
                                            Usuario:
                                            @if ($teacher->user)
                                                <a href="{{ route('users.show', [$teacher->user->id]) }}" class="internal-link">
                                                    {{ $teacher->user->name }}
                                                </a>
                                            @else
                                                Sin asignar.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-floating-icon>
        <x-slot name="url">{{ route('teachers.create') }}</x-slot>
    </x-floating-icon>
</x-template-layout>



{{--
    <h1>Lista de profesores</h1>
    <a href="{{ route('teachers.create') }}">create</a>
    <ul>
        @foreach ($teachers as $teacher)
            <li><a href="{{ route('teachers.show', [$teacher]) }}"> {{ $teacher->name . ' ' . $teacher->lastname }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Profesores Eliminadas</h4>
    <ul>
        @foreach ($trashed as $trash)
            <li>{{ $trash->name . ' ' . $trash->lastname }}</li>
        @endforeach
    </ul>
--}}
