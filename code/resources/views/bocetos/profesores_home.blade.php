<x-template-layout>
    <div class="container">
    <x-card-alignment>
        <div class="container mt-5">
            <div class="row"
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo">
                                <h5 class="card-title">Total Estudiantes</h5>
                            </x-slot>
                            <x-slot name="texto">
                                <p class="card-text">150</p>
                            </x-slot>
                            <x-slot name="boton"><a href="/estudiantes" class="btn btn-primary">Ver
                                    Detalles</a></x-slot>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo1">
                                <h5 class="card-title">Materias Asignadas</h5>
                            </x-slot>

                            <x-slot name="texto1">
                                <p class="card-text">5 Materias</p>
                            </x-slot>
                            <x-slot name="boton1"><a href="/materias" class="btn btn-success">Ver Materias</a></x-slot>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo2">
                                <h5 class="card-title">Próxima Clase</h5>
                            </x-slot>
                            <x-slot name="texto2">
                                <p class="card-text">Física - 10:00 AM</p>
                            </x-slot>
                            <x-slot name="boton2"><a href="/horarios" class="btn btn-info">Ver Horarios</a></x-slot>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <x-slot name="titulo3">
                                <h5 class="card-title">Tareas por Calificar</h5>
                            </x-slot>
                            <x-slot name="texto3">
                                <p class="card-text">8 Tareas</p>
                            </x-slot>
                            <x-slot name="boton3"><a href="/tareas" class="btn btn-warning">Ver Tareas</a></x-slot>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </x-card-alignment>

    <div class="card mb-4 mt-4">
        <div class="card-header">Notificaciones</div>
        <div class="card-body">
            <ul>
                <li><strong>Nuevo:</strong> El alumno @PepitoPeta a entregado una nueva tarea.</li>
                <li><strong>Material:</strong> Se agrego nuevo material en Matematicas.</li>
                <li><strong>Anuncio:</strong> No habra clases el 25 de diciembre.</li>
            </ul>
        </div>
    </div>
</div>
</x-template-layout>
