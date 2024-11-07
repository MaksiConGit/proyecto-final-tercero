<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Layout con Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

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
                <a href="#" class="text-white hover:underline font-semibold">Base de Datos</a>
            </li>
        </ol>
        </div>
    </nav>

    <!-- Layout Principal -->
    <div class="flex flex-grow">
        
        <!-- Aside Izquierdo -->
        <aside class="bg-gray-300 w-48 p-6 hidden md:block">
            <h2 class="text-xl font-bold mb-4 flex justify-center pb-2 border-b-2 border-gray-400">Carreras</h2>
            <ul class="space-y-4">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-gray-300 text-gray-900"
                    data-inactive-classes="text-gray-600">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <span>Sistemas</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-4 border-b border-gray-400">
                            <p class="mb-1 text-gray-500 flex justify-center">Cursos</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Materias</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Alumnos</p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>Robotica</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-4 border-b border-gray-400">
                            <p class="mb-1 text-gray-500 flex justify-center">Cursos</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Materias</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Alumnos</p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-3">
                        <button button type="button"
                            class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span>Industrial</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-4 border-b border-gray-400">
                            <p class="mb-1 text-gray-500 flex justify-center">Cursos</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Materias</p>
                            <p class="mb-1 text-gray-500 flex justify-center">Alumnos</p>
                            <ul class="ps-5 text-gray-500 list-disc">
                            </ul>
                        </div>
                    </div>
                </div>
            </ul>
        </aside>

        <!-- Contenido Principal Centrado -->
        <main class="flex-grow flex items-center justify-center bg-gray-50">
            <div class="text-center max-w-lg">
                <h1 class="text-2xl font-bold mb-4">Texto en el Centro</h1>
                <p class="text-gray-600">Este es un ejemplo de texto centrado en la pantalla usando Tailwind CSS.</p>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>
</html>
