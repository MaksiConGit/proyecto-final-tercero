<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor: Horarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="h-screen flex flex-col">

    <header class="bg-purple-900 text-white px-5 py-2 ">
        <div class="m-0 flex items-center justify-between ">
            <h1 class="text-2xl font-bold">Instituto</h1>
            <div class="w-8 h-8">
                <img src="../images/usuario_foto.png" alt="Icono de usuario">
            </div>
        </div>
    </header>
    <!-- Barra de Navegación -->
    <nav class="bg-purple-800 text-white p-4">
        <ol class="flex items-center justify-center space-x-2">
            <li>
                <a href="index.html" class="flex items-center text-white hover:underline font-semibold">
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
                <a href="#" class="text-white hover:underline font-semibold">Horarios</a>
            </li>
        </ol>
        </div>
    </nav>

    <!-- Layout Principal -->
    <div class="flex flex-grow">

        <!-- Aside Izquierdo -->
        <aside class="bg-gray-200 w-48 p-2 hidden md:block border-r border-gray-400">
            <h2 class="text-xl font-bold flex justify-center pb-2 border-b-2 border-gray-400">Carreras</h2>
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-500 bg-gray-300"
                data-inactive-classes="text-gray-500">
                <h2 id="accordion-flush-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                        aria-controls="accordion-flush-body-1">
                        <span class="ml-2">Sistemas</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">1ro</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">2do</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">3ro</a>
                        </div>
                    </div>
                </div>

                <h2 id="accordion-flush-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                        aria-controls="accordion-flush-body-2">
                        <span class="ml-2">Robotica</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">1ro</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">2do</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">3ro</a>
                        </div>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                        aria-controls="accordion-flush-body-3">
                        <span class="ml-2">Industrial</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">1ro</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">2do</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">3ro</a>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Contenido Principal Centrado -->
        <main class="flex-grow flex items-center justify-center bg-gray-50 mt-4 mb-4">

            <div class="w-full max-w-3xl bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="w-full max-w-3xl bg-gray-100 shadow-xl rounded-lg overflow-hidden border border-gray-600">
                    <h2 class="text-2xl font-bold p-4 text-center bg-gray-400">Sistema</h2>
                    <div class="overflow-x-auto border-t border-gray-600">
                        <table class="min-w-full border border-gray-300 text-center">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-3 border border-gray-400">Hora</th>
                                    <th class="p-3 border border-gray-400">Lunes</th>
                                    <th class="p-3 border border-gray-400">Martes</th>
                                    <th class="p-3 border border-gray-400">Miercoles</th>
                                    <th class="p-3 border border-gray-400">Jueves</th>
                                    <th class="p-3 border border-gray-400">Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Fila de ejemplo -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">7:30 - 8:30</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                </tr>
                                <!-- Fila adicional -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">8:40 - 9:40</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full max-w-3xl bg-white shadow-xl rounded-lg overflow-hidden border border-gray-600 mt-10">
                    <h2 class="text-2xl font-bold p-4 text-center bg-gray-400">Robotica</h2>
                    <div class="overflow-x-auto border-t border-gray-600">
                        <table class="min-w-full border border-gray-300 text-center">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-3 border border-gray-400">Hora</th>
                                    <th class="p-3 border border-gray-400">Lunes</th>
                                    <th class="p-3 border border-gray-400">Martes</th>
                                    <th class="p-3 border border-gray-400">Miercoles</th>
                                    <th class="p-3 border border-gray-400">Jueves</th>
                                    <th class="p-3 border border-gray-400">Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Fila de ejemplo -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">7:30 - 8:30</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                </tr>
                                <!-- Fila adicional -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">8:40 - 9:40</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full max-w-3xl bg-white shadow-xl rounded-lg overflow-hidden border border-gray-600 mt-10">
                    <h2 class="text-2xl font-bold p-4 text-center bg-gray-400">Industrial</h2>
                    <div class="overflow-x-auto border-t border-gray-600">
                        <table class="min-w-full border border-gray-300 text-center">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-3 border border-gray-400">Hora</th>
                                    <th class="p-3 border border-gray-400">Lunes</th>
                                    <th class="p-3 border border-gray-400">Martes</th>
                                    <th class="p-3 border border-gray-400">Miercoles</th>
                                    <th class="p-3 border border-gray-400">Jueves</th>
                                    <th class="p-3 border border-gray-400">Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Fila de ejemplo -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">7:30 - 8:30</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                </tr>
                                <!-- Fila adicional -->
                                <tr>
                                    <td class="p-3 border border-gray-400" contenteditable="true">8:40 - 9:40</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Sistemas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Programacion</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">-</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Practicas</td>
                                    <td class="p-3 border border-gray-400" contenteditable="true">Diseño</td>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>
