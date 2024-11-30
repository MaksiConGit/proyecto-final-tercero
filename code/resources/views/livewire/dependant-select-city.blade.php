<div>
    <label for="country">* Country:</label>
    <select wire:model.live="selectedCountry" name="country" id="country" required>
        <option value="">Choose Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>

    <br>

    <label for="province">* Province:</label>
    <select wire:model.live="selectedProvince" name="province" id="province" required>
        <option value="">Choose Province</option>

        @if ($provinces && $provinces->isNotEmpty())
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        @endif
    </select>

    <br>

    <label for="city_id">* City:</label>
    <select wire:model="selectedCity" name="city_id" id="city_id" required>
        <option value="">Choose City</option>
        @if ($cities)
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        @endif
    </select>
</div>
