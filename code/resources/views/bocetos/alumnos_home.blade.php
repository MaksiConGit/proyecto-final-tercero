<x-template-layout>
    <div class="container">
        <x-card-alignment>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo">
                                <h5 class="card-title">Tareas Pendientes</h5>
                            </x-slot>

                            <x-slot name="texto">
                                <p class="card-text">3 tareas por entregar</p>
                            </x-slot>

                            <x-slot name="boton"><a href="/tareas" class="btn btn-primary">Ver Detalles</a></x-slot>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo1">
                                <h5 class="card-title">Última Calificación</h5>
                            </x-slot>

                            <x-slot name="texto1">
                                <p class="card-text">Matemáticas: 9/10</p>
                            </x-slot>

                            <x-slot name="boton1"><a href="/calificaciones" class="btn btn-success">Ver
                                    Calificaciones</a></x-slot>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo2">
                                <h5 class="card-title">Asistencia</h5>
                            </x-slot>
                            <x-slot name="texto2">
                                <p class="card-text">95%</p>
                            </x-slot>
                            <x-slot name="boton2"><a href="/asistencia" class="btn btn-info">Ver Detalles</a></x-slot>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo3">
                                <h5 class="card-title">Próxima Clase
                            </x-slot>
                            <x-slot name="texto3">
                                <p class="card-text">Física a las 10:00 AM</p>
                            </x-slot>
                            <x-slot name="boton3"><a href="/materias" class="btn btn-warning">Ver Materias</a></x-slot>
                        </div>
                    </div>
                </div>
            </div>
        </x-card-alignment>

        {{-- <x-card> --}}
        <div class="card mb-4 mt-4">
            <div class="card-header">Notificaciones</div>
            <div class="card-body">
                <ul>
                    <li><strong>Nuevo:</strong> Clase de Historia reprogramada para el 5 de diciembre.</li>
                    <li><strong>Material:</strong> Se agrego nuevo material en Matematicas.</li>
                    <li><strong>Anuncio:</strong> No habra clases el 25 de diciembre.</li>
                </ul>
            </div>
        </div>
        {{-- </x-card> --}}
    </div>
</x-template-layout>
