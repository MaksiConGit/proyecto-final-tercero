<div>
    <x-input-select wire:model.live="selectedCountry">
        <x-slot name="titulo">País</x-slot>
        <x-slot name="name">country</x-slot>
        <x-slot name="opciones">
            <option value="" selected hidden>Seleccione un país</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </x-slot>
    </x-input-select>

    <x-input-select wire:model.live="selectedProvince">
        <x-slot name="titulo">Provincia</x-slot>
        <x-slot name="name">province</x-slot>
        <x-slot name="opciones">
            <option value="" selected hidden>Seleccione una provincia</option>
            @if ($provinces && $provinces->isNotEmpty())
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            @endif
        </x-slot>
    </x-input-select>

    <x-input-select wire:model="selectedCity">
        <x-slot name="titulo">Ciudad</x-slot>
        <x-slot name="name">city_id</x-slot>
        <x-slot name="opciones">
            <option value="" selected hidden>Seleccione una ciudad</option>
            @if ($cities)
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            @endif
        </x-slot>
    </x-input-select>
</div>
