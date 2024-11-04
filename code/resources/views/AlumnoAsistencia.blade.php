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
            <div class="w-14 h-14 rounded-full overflow-hidden mr-4">
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
                <a href="#" class="text-white hover:underline font-semibold">Asistencia</a>
            </li>

        </ol>
        </div>
    </nav>

    <div class="flex">
        <div class="flex py-2 w-full bg-white-300">
            <aside class=" w-44 bg-gray-200 text-black min-h-screen border-r-2 border-gray-300 p-2">
                <h2 class="text-xl font-bold mb-4 flex justify-center pb-2 border-b-2 border-gray-400">
                    Sistemas</h2>
                <ul class="space-y-4">
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-gray-300 text-gray-900"
                        data-inactive-classes="text-gray-600">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button"
                                class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                                data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                                aria-controls="accordion-flush-body-1">
                                <span>Materias</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="" fill="none" viewBox="0 0 10 6">

                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />

                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class="py-4 border-b border-gray-400">
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">Base de Datos</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">
                                    Desarrollo de Sistemas</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">Redes
                                    y Comunicaciones</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">
                                    Seguridad de los Sistemas</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">
                                    Sistemas de Informacion
                                    Organizacionesles</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">
                                    Practicas Profesionalizantes 2</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">
                                    Derechos y Legislacion Laboral</a>
                                <a href="materia.html" class="mb-1 text-gray-500 flex justify-center">Etica
                                    y Responsabilidad Social</a>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <a href="Asistencias.html">Asistencias</a>
                        </button>
                    </h2>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <a href="">Profesores</a>
                        </button>
                    </h2>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <a href="">Material</a>
                        </button>
                    </h2>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <a href="">Notas</a>
                        </button>
                    </h2>
                </ul>
            </aside>
            <!-- Lista de materias con asistencia individual -->
            <div class="max-w-4xl min-h-min mt-3">
                <h2 class="text-3xl p-4 font-bold mb-2">Asistencia por Materia</h2>
                <div class="space-y-2 p-4 grid grid-cols-2 gap-4">
                    <!-- Materia 1 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Base de Datos</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">85%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 2 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Desarrollo Web</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">90%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 3 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Seguridad de los Sistemas</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">78%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 4 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Etica y Responsabilidad Social</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="yellow"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">65%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 5 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Derecho Laboral</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="red"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">30%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 6 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Practicas Profesionalizantes 2</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">95%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 7 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Redes y Comunicacioens</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">88%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materia 8 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center min-h-32">
                        <div>
                            <h2 class="text-xl font-bold">Sistemas de Informacion Organizacionesles</h2>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 relative">
                                <svg viewBox="0 0 36 36" class="w-full h-full">
                                    <circle cx="18" cy="18" r="15" stroke="gray" stroke-width="3"
                                        fill="none" />
                                    <path d="M18 3 a 15 15 0 0 1 0 30 a 15 15 0 0 1 0 -30" stroke="green"
                                        stroke-width="3" fill="none" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-bold text-xl">92%</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
