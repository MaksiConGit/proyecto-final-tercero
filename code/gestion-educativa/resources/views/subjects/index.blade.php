<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Materias</title>
    <link rel="stylesheet" href="{{ asset('styles.css')}}">
</head>
<body>
    <div class="container">
        <!-- Barra superior -->
        <div class="navbar">
            <div class="user-icon">
                <img src="user-icon.png" alt="Icono de usuario">
            </div>
        </div>

        <!-- Menú lateral -->
        <div class="sidebar">
            <ul>
                <li><a href="#">Página principal</a></li>
                <li><a href="materia.html">Materias</a></li>
                <li><a href="asistencia.html">Asistencia</a></li>
                <li><a href="profesores.html">Profesores</a></li>
                <li><a href="material.html">Material</a></li>
                <li><a href="calendario.html">Calendario</a></li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="main-content">
            <div class="card-grid">
                <!-- Ejemplo de tarjeta -->

                @foreach ($subjects as $subject)
                    <div class="card">
                        <a href="/subjects/{{$subject->id}}"> <img src="Materia.png" alt="Imagen de Materia"></a>
                        <div class="card-content">
                                <h3>{{$subject->name}}</h3>
                                <p>{{$subject->teacher}}</p>
                                <p>{{$subject->time1}} - {{$subject->time2}}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</body>
</html>