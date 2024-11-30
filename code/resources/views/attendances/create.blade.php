<x-app-layout>
    <h1>Create de asistencias</h1>
    <hr>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @livewire('AttendancesRecordCreate')

        <button type="submit"> Subir Asistencia </button>

    </form>
</x-app-layout>
