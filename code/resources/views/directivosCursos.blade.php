<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor: Alumnos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>

</head>
{{-- Componente body --}}
<body class="h-screen flex flex-col">

    {{-- Componente header --}}
    <header class="bg-purple-900 text-white px-5 py-2">
        <div class="m-0 flex items-center justify-between ">
            <h1 class="textS-2xl font-bold">Instituto</h1>
            <div class="w-8 h-8">
                <img class="rounded-xl border-2 border-white w-8 h-8" src="../images/usuario_foto.png"
                    alt="Icono de usuario">
            </div>
        </div>
    </header>
    <!--Componente nav -->
    <nav class="flex justify-evenly bg-purple-800 text-white p-4">
        <ol class="flex items-center justify-center space-x-2">
            <li>
                <a href="index.html" class="flex items-center text-white hover:underline font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 1.707a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                    </svg>
                    Principal directivos
                </a>
            </li>
        </div>
    </nav>
    
    <!-- Componente layout principal -->
    <div class="flex flex-grow">
        <!-- Aside Izquierdo -->
        <aside class="bg-gray-200 w-48 p-2 hidden md:block border-r border-gray-400">
            <h2 class="text-xl font-bold flex justify-center pb-2 border-b-2 border-gray-400">Secciones</h2>
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-500 bg-gray-200"
                data-inactive-classes="text-gray-500">
                <h2 id="accordion-flush-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                        aria-controls="accordion-flush-body-1">
                        <span class="ml-2">Carreras</span>
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
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">Sistemas</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">Robotica</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">Industrial</a>
                        </div>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-5">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-5" aria-expanded="false"
                        aria-controls="accordion-flush-body-5">
                        <span class="ml-2">Notas</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                        </div>
                        </ul>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-6">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-6" aria-expanded="false"
                        aria-controls="accordion-flush-body-6">
                        <span class="ml-2">Asistencias</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                        </div>
                        </ul>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-7">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-600 border-b border-gray-200 dark:border-gray-400 gap-3"
                        data-accordion-target="#accordion-flush-body-7" aria-expanded="false"
                        aria-controls="accordion-flush-body-7">
                        <span class="ml-2">Cuentas</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
                    <div class="border-b border-gray-200">
                        <div class="">
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                            <a href="materia.html"
                                class="py-2 border-b hover:bg-gray-300 border-gray-400 text-sm text-gray-500 flex justify-center">-</a>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Contenido Principal Centrado -->
        <main class="flex-grow flex bg-gray-200 pb-4 pt-4">
            <div class="w-8/12 h-min mx-auto bg-gray-50 p-3 rounded-lg shadow-lg">
                <form class="flex justify-center">
                    <div class="block w-full">
                        <h1 class="flex justify-center font-bold text-2xl border-b border-gray-300 pb-2">Crear carrera, cursos y divisiones</h1>
                        <div class="flex justify-center">
                            <div class="mt-3 block">
                                <label for="nombre_carrera"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nombre de la carrera</label>
                                <input type="text" id="nombre_carrera"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Analisis en Sistemas" required />
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="mt-3 block">
                                <label for="cantidad" class="text-sm font-medium text-gray-900">Ingresa la cantidad de cursos</label>
                                <input type="number" id="cantidad" min="1"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Cantidad de cursos" required />
                                <div class="flex justify-center">
                                    <button onclick="generarInputs()"
                                        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2">Generar cursos y divisiones</button>
                                </div>
                            </div>

                        </div>
                        <div class="flex justify-center">
                            <div id="contenedorInputs" class="mt-4"></div>
                        </div>
                        <div class="flex justify-center">
                            <button id="cargarDatos" class="mt-4 bg-green-500 text-white rounded-lg p-2 hover:bg-green-600">Cargar datos</button>
                        </div>
                    </div>

                    <script>
                        function generarInputs() {
                            // Obtener el número de cursos a generar
                            const cantidad = document.getElementById("cantidad").value;
                            const contenedor = document.getElementById("contenedorInputs");

                            // Limpiar el contenedor
                            contenedor.innerHTML = "";

                            // Crear inputs de curso y división según la cantidad ingresada
                            for (let i = 1; i <= cantidad; i++) {
                                const div = document.createElement("div");
                                div.className = "input-group";

                                const inputCurso = document.createElement("input");
                                inputCurso.type = "text";
                                inputCurso.placeholder = `Curso ${i}`;
                                inputCurso.className = "mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-2/3 p-2.5"; // Aplicar clases de diseño

                                const inputDivision = document.createElement("input");
                                inputDivision.type = "text";
                                inputDivision.placeholder = "División";
                                inputDivision.className = "mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/4 p-2.5 ml-6"; // Aplicar clases de diseño para división más pequeño

                                div.appendChild(inputCurso);
                                div.appendChild(inputDivision);
                                contenedor.appendChild(div);
                            }
                        }
                    </script>
</form>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>
