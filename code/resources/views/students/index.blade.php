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
            @foreach ($students as $student)
                <div class="row mb-1">
                    <div class="col-md">
                        <div class="card position-relative">
                            <a href="{{ route('students.show', [$student->id]) }}" class="stretched-link"></a>
                            <div class="row g-8">
                                <div class="col-md-2">
                                    <img class="card-img card-img-left" src="../../template_files/assets/img/elements/12.jpg"
                                        alt="Card image" />
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $student->name . ', ' . $student->lastname }}</h5>
                                        <p class="card-text">
                                            {{-- Materias:
                                            @if ($student->subjects->isNotEmpty())
                                                @foreach ($student->subjects as $subject)
                                                    <a href="{{ route('subjects.show', [$subject->id]) }}" class="internal-link">
                                                        {{ $subject->name }}
                                                    </a>
                                                @endforeach
                                            @else
                                                Sin asignar.
                                            @endif
                                            <br> --}}
                                            Usuario:
                                            @if ($student->user)
                                                <a href="{{ route('users.show', [$student->user->id]) }}" class="internal-link">
                                                    {{ $student->user->name }}
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
        <x-slot name="url">{{ route('students.create') }}</x-slot>
    </x-floating-icon>
</x-template-layout>

