<div>
    <!-- Buscador en tiempo real -->
    <input type="text" wire:model.live="searchTerm" placeholder="Buscar directivos...">
    <!-- Filtro por Institución -->
    <x-input-select wire:model.live="selectedInstitution">
        <x-slot name="titulo">Institución</x-slot>
        <x-slot name="name">institution</x-slot>
        <x-slot name="opciones">
            <option value="">Todas las instituciones</option>
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>

    <div class="d-flex flex-column align-items-stretch gap-3">
        @foreach ($principals as $principal)
            <div class="row mb-1">
                <div class="col-md">
                    <div class="card position-relative">
                        <a href="{{ route('principals.show', [$principal->id]) }}" class="stretched-link"></a>
                        <div class="row g-8">
                            <div class="col-md-2">
                                <img class="card-img card-img-left"
                                    src="../../template_files/assets/img/elements/12.jpg" alt="Card image" />
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $principal->name . ', ' . $principal->lastname }}</h5>
                                    <p class="card-text">
                                        Usuario:
                                        @if ($principal->user)
                                            <a href="{{ route('users.show', [$principal->user->id]) }}"
                                                class="internal-link">
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
