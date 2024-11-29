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
            @foreach ($principals as $principal)
                <div class="row mb-1">
                    <div class="col-md">
                        <div class="card position-relative">
                            <a href="{{ route('principals.show', [$principal->id]) }}" class="stretched-link"></a>
                            <div class="row g-8">
                                <div class="col-md-2">
                                    <img class="card-img card-img-left" src="../../template_files/assets/img/elements/12.jpg"
                                        alt="Card image" />
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $principal->name . ', ' . $principal->lastname }}</h5>
                                        <p class="card-text">
                                            {{-- Materias:
                                            @if ($principals->subjects->isNotEmpty())
                                                @foreach ($principals->subjects as $subject)
                                                    <a href="{{ route('subjects.show', [$subject->id]) }}" class="internal-link">
                                                        {{ $subject->name }}
                                                    </a>
                                                @endforeach
                                            @else
                                                Sin asignar.
                                            @endif
                                            <br> --}}
                                            Usuario:
                                            @if ($principal->user)
                                                <a href="{{ route('users.show', [$principal->user->id]) }}" class="internal-link">
                                                    {{ $principal->user->name }}
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
        <x-slot name="url">{{ route('principals.create') }}</x-slot>
    </x-floating-icon>
</x-template-layout>



{{--
    <h1>Lista de profesores</h1>
    <a href="{{ route('principals.create') }}">create</a>
    <ul>
        @foreach ($principals as $principals)
            <li><a href="{{ route('principals.show', [$principals]) }}"> {{ $principals->name . ' ' . $principals->lastname }}</a>
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
