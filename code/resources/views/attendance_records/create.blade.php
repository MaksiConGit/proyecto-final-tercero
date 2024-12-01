<x-template-layout>
    <div class="container">
        <div class="container">
            <h3>Asistencias</h3>

            @livewire('AttendanceCreate')

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-template-layout>
