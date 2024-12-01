<x-template-layout>
    <div class="container mt-5">
        <x-card-alignment>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <x-slot name="titulo"><h5 class="card-title">Total Estudiantes</h5></x-slot>
                        <x-slot name="texto"><p class="card-text">1200 Estudiantes</p></x-slot>
                        <x-slot name="boton"><a href="/estudiantes" class="btn btn-primary">Ver Estudiantes</a></x-slot>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <x-slot name="titulo1"><h5 class="card-title">Total Profesores</h5></x-slot>
                        <x-slot name="texto1"><p class="card-text">75 Profesores</p></x-slot>
                        <x-slot name="boton1"><a href="/profesores" class="btn btn-success">Ver Profesores</a></x-slot>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <x-slot name="titulo2"><h5 class="card-title">Materias Activas</h5></x-slot>
                        <x-slot name="texto2"><p class="card-text">30 Materias</p></x-slot>
                        <x-slot name="boton2"><a href="/materias" class="btn btn-primary">Ver Materias</a></x-slot> 
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <x-slot name="titulo3"><h5 class="card-title">Total Carreras</h5></x-slot>
                        <x-slot name="texto3"><p class="card-text">15</p></x-slot>
                        <x-slot name="boton3"><a href="/eventos" class="btn btn-info">Ver Carreras</a></x-slot>
                    </div>
                </div>
            </div>
        </div>
    </x-card-alignment>
        <!-- Gráficos -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h5>Promedio de Calificaciones por Materia</h5>
                <canvas id="progresoAcademico"></canvas>
                <script>
                    const ctx = document.getElementById('progresoAcademico').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Matemáticas', 'Física', 'Historia'],
                            datasets: [{
                                label: 'Calificaciones',
                                data: [8, 9, 7],
                                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc']
                            }]
                        }
                    });
                </script>

            </div>
            <div class="col-md-6">
                <h5>Asistencia Promedio por Mes</h5>
                <x-progress>
                    <x-slot name="nombreMes">
                        <p>Abril</p>
                    </x-slot>
                    <x-slot name="nombreMes1">
                        <p>Mayo</p>
                    </x-slot>
                    <x-slot name="nombreMes2">
                        <p>Diciembre</p>
                    </x-slot>
                </x-progress>
            </div>
        </div>
    
    </div>
</x-template-layout>
