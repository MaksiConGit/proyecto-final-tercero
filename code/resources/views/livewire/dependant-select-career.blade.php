<div>
    <!-- Select de instituciones -->
    <div>
        <label for="institution">Institución</label>
        <select id="institution" wire:model.live="selectedInstitution">
            <option value="" selected>Seleccione una institución</option>
            @foreach($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select de carreras dependientes -->
    <div>
        <label for="career">Carrera</label>
        <select id="career" wire:model="selectedCareer" @if(!$careers) disabled @endif>
            <option value="" selected>Seleccione una carrera</option>
            @foreach($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </select>
    </div>

</div>
