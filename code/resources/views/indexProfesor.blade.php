<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de Carreras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-200">

    <header class="bg-purple-900 text-white px-5 py-2 ">
        <div class="m-0 flex items-center justify-between ">
            <h1 class="text-2xl font-bold">Instituto</h1>
            <div class="w-8 h-8">
                <img src="../images/usuario_foto.png" alt="Icono de usuario">
            </div>
        </div>
    </header>

    <nav class="bg-purple-800 text-white p-4">
        <ol class="flex items-center justify-center space-x-2">
            <li>
                <a href="www.youtube.com" class="flex items-center text-white hover:underline font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10.707 1.707a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                    </svg>
                    Pagina principal
                </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </li>
            <li>
                <a href="#" class="text-white hover:underline font-semibold">Materias</a>
            </li>
        </ol>
        </div>
    </nav>

    <x-asideMaterias />

    <div class="flex-auto p-6">
        <div class="flex justify-between">
            <div class="ml-1 grid grid-cols-3 gap-4">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="../images/Materia.png" alt="Base de Datos" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Base de Datos</h2>
                            <p class="text-gray-500">Nicolas Rotili</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="../images/Materia.png" alt="Base de Datos" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Base de Datos</h2>
                            <p class="text-gray-500">Nicolas Rotili</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="../images/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Matematicas</h2>
                            <p class="text-gray-500">Fede</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="../images/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Seguridad</h2>
                            <p class="text-gray-500">Walter</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="../images/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Programacion</h2>
                            <p class="text-gray-500">Nico Rotili</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <x-calendario />

    <div
        class="fixed bottom-6 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
        <img src="../images/mas.png" alt="Botón 1" class="w-10 h-10">
    </div>

    <!-- Botón 2 -->
    <div
        class="fixed bottom-24 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
        <img src="../images/estudiantes.png" alt="Botón 2" class="w-10 h-10">
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
