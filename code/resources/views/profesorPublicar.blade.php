<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia: Base de Datos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-200">

    <header class="bg-purple-900 text-white px-5 py-2 ">
        <div class="m-0 flex items-center justify-between ">
            <h1 class="text-2xl font-bold">Instituto</h1>
            <div class="w-8 h-8">
                <img src="../images/icono.png" alt="Icono de usuario">
            </div>
        </div>
    </header>

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
                <a href="../images/materia.png" class="text-white hover:underline font-semibold">Base de Datos</a>
            </li>
        </ol>
        </div>
    </nav>

    <div class="flex">
        <div class="flex mt-2">
            <aside class=" w-44 bg-gray-200 text-black min-h-screen border-r-2 border-gray-300 p-2">
                <h2 class="text-xl font-bold flex justify-center pb-2 border-b-2 border-gray-400">Carreras</h2>
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-500"
                    data-inactive-classes="text-gray-500">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 dark:border-gray-400 gap-3"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <span>Sistemas</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
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
                            class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 dark:border-gray-400 gap-3"
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
                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-400 gap-3"
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

            <div class="flex-1 justify-center mx-44">
                <div class="bg-white shadow-md rounded-lg p-3 mb-6 w-full">
                    <img src="../images/Materia.png" alt="Imagen de Base de Datos"
                        class="rounded-lg w-full h-56 object-cover mb-4">
                    <h1 class="text-4xl font-bold text-gray-800">Base De Datos</h1>
                    <div class="flex items-center mt-4">
                        <img src="../images/profesor.png" alt="Profesor" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700">Profesor Nicolas Rotilli</h2>
                            <p class="text-gray-600">rotillinicolas@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Lista de Materiales -->
                <div class="space-y-4">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-xl font-semibold text-gray-800">Temario de la materia</h3>
                        <p class="text-gray-600 mb-2">Nicolas Rotilli - 30 Abril</p>
                        <p class="text-gray-600">En este PDF está todo el temario de la materia, las modalidades que
                            hay y demás.</p>
                        <p><a href="fpdf/indexfpdf.php" class="text-indigo-600 font-bold mt-2 block">Descargar
                                PDF</a></p>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-xl font-semibold text-gray-800">Material</h3>
                        <p class="text-gray-600 mb-2">Nicolas Rotilli - 30 Agosto</p>
                        <p class="text-gray-600">En este PDF está todo el material de la materia.</p>
                        <a href="material.pdf" class="text-indigo-600 font-bold mt-2 block">Descargar PDF</a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-xl font-semibold text-gray-800">Temario del Parcial</h3>
                        <p class="text-gray-600 mb-2">Nicolas Rotilli - 18 Agosto</p>
                        <p class="text-gray-600">En este PDF está el temario para el próximo parcial.</p>
                        <a href="parcial.pdf" class="text-indigo-600 font-bold mt-2 block">Descargar PDF</a>
                    </div>
                </div>
            </div>

            <aside class="pr-7">

                <body class="flex items-center justify-center min-h-screen bg-gray-100">

                    <div class="w-80 p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between bg-blue-500 text-white rounded-t-lg p-3">
                            <button onclick="changeMonth(-1)" class="text-lg">&#10094;</button>
                            <span id="month-year" class="font-bold"></span>
                            <button onclick="changeMonth(1)" class="text-lg">&#10095;</button>
                        </div>
                        <div class="grid grid-cols-7 text-center mt-2 gap-y-3">
                            <!-- Días de la semana -->
                            <div class="font-semibold text-gray-600">Dom</div>
                            <div class="font-semibold text-gray-600">Lun</div>
                            <div class="font-semibold text-gray-600">Mar</div>
                            <div class="font-semibold text-gray-600">Mié</div>
                            <div class="font-semibold text-gray-600">Jue</div>
                            <div class="font-semibold text-gray-600">Vie</div>
                            <div class="font-semibold text-gray-600">Sáb</div>
                            <!-- Días del mes generados con JavaScript -->
                        </div>

                        <div class="flex justify-center w-6/6">
                            <button
                                class="w-1/3 bg-green-500 text-white mt-4 py-2 rounded-md hover:bg-green-600 m-auto"
                                onclick="goToCurrentMonth()">
                                Mes Actual
                            </button>
                        </div>

                        <!-- Acordeón para fechas importantes -->
                        <div class="mt-4">
                            <button
                                class="w-full bg-gray-200 text-gray-700 py-2 rounded-md font-medium hover:bg-gray-300"
                                onclick="toggleAccordion()">
                                Fechas Importantes
                            </button>
                            <div id="accordion-content" class="hidden mt-2 p-2 bg-gray-200 rounded-lg">
                                <ul id="important-dates" class="list-disc list-inside text-gray-600">
                                    <!-- Fechas importantes generadas dinámicamente -->
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <div class="group fixed bottom-6 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300"
        id="openFormBtn2">
        <img src="../images/material.png" alt="Botón 1" class="w-10 h-10">
        <div
            class="absolute mr-20 mt-1 transform -translate-x-1/2 mb-2 w-48 bg-purple-700 text-white text-center rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Material</div>
    </div>

    <!-- Botón 2 -->
    <div class="group fixed bottom-24 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300"
        id="openFormBtn">
        <img src="../images/examen.png" alt="Botón 2" class="w-10 h-10">
        <div
            class="absolute mr-20 mt-1 transform -translate-x-1/2 mb-2 w-48 bg-purple-700 text-white text-center rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Examen</div>
    </div>



    <!-- Overlay del formulario -->
    <div id="formExamen" class="hidden">
        <div class="fixed inset-0 flex bg-black bg-opacity-50 justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-center">
                    <h2 class="text-xl mb-2">Formulario</h2>
                </div>
                <form action="$$" method="post" enctype="multipart/form-data">
                    <label for="name" class="block mb-2 border-t border-gray-400 pt-2">Titulo del examen</label>
                    <input type="text" id="name" name="name" class="border p-2 w-full mb-4 rounded"
                        required>

                    <label for="email" class="block mb-2">Descripcion</label>
                    <input type="email" id="email" name="email" class="border p-2 w-full mb-4 rounded"
                        required>

                    <label for="archivo">Selecciona un archivo:</label>
                    <input class="mt-2 mb-2 border-b border-gray-400 pb-3" type="file" id="archivo"
                        name="archivo">

                    <div class="flex justify-evenly w-full pt-1">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded">Enviar</button>
                        <button id="closeFormBtn"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="formMaterial" class="hidden">
        <div class="fixed inset-0 flex bg-black bg-opacity-50 justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-center">
                    <h2 class="text-xl mb-2">Formulario</h2>
                </div>
                <form action="$$" method="post" enctype="multipart/form-data">
                    <label for="name" class="block mb-2 border-t border-gray-400 pt-2">Titulo del material</label>
                    <input type="text" id="name" name="name" class="border p-2 w-full mb-4 rounded"
                        required>

                    <label for="email" class="block mb-2">Descripcion</label>
                    <input type="email" id="email" name="email" class="border p-2 w-full mb-4 rounded"
                        required>

                    <label for="archivo">Selecciona un archivo:</label>
                    <input class="mt-2 mb-2 border-b border-gray-400 pb-3" type="file" id="archivo"
                        name="archivo">

                    <div class="flex justify-evenly w-full pt-1">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded">Enviar</button>
                        <button id="closeFormBtn2"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('openFormBtn').addEventListener('click', function() {
            document.getElementById('formExamen').classList.remove('hidden');
        });

        document.getElementById('closeFormBtn').addEventListener('click', function() {
            document.getElementById('formExamen').classList.add('hidden');
        });

        // Opcional: cerrar el overlay al hacer clic fuera del formulario
        document.getElementById('formExamen').addEventListener('click', function(event) {
            if (event.target === this) {
                document.getElementById('formExamen').classList.add('hidden');
            }
        });

        // aca

        document.getElementById('openFormBtn2').addEventListener('click', function() {
            document.getElementById('formMaterial').classList.remove('hidden');
        });

        document.getElementById('closeFormBtn2').addEventListener('click', function() {
            document.getElementById('formMaterial').classList.add('hidden');
        });

        // Opcional: cerrar el overlay al hacer clic fuera del formulario
        document.getElementById('formMaterial').addEventListener('click', function(event) {
            if (event.target === this) {
                document.getElementById('formMaterial').classList.add('hidden');
            }
        });
    </script>

    <script>
        // Fechas importantes con formato "DD/MM/YYYY"
        const specialDates = {
            '10/10/2024': 'Día de Ventas Especial',
        };

        let currentDate = new Date();
        let selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

        function renderCalendar() {
            const daysContainer = document.querySelector('.grid-cols-7:nth-child(2)');
            const monthYearElement = document.getElementById('month-year');
            daysContainer.innerHTML = '';

            const year = selectedDate.getFullYear();
            const month = selectedDate.getMonth();

            // Actualizar el título con el mes y año actuales
            monthYearElement.textContent = selectedDate.toLocaleString('es-ES', {
                month: 'long',
                year: 'numeric'
            });

            // Obtener primer día y cantidad de días del mes
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Generar días en blanco hasta el primer día del mes
            for (let i = 0; i < firstDayOfMonth; i++) {
                const blankDay = document.createElement('div');
                daysContainer.appendChild(blankDay);
            }

            // Llenado de días del mes
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'rounded-md', 'text-sm',
                    'font-medium');

                // Cambiar el formato a DD/MM/YYYY
                const dateKey = `${String(day).padStart(2, '0')}/${String(month + 1).padStart(2, '0')}/${year}`;

                // Marcar día actual
                if (day === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate
                    .getFullYear()) {
                    dayElement.classList.add('bg-yellow-400', 'text-white', 'font-bold');
                }
                // Marcar días especiales en azul
                else if (specialDates[dateKey]) {
                    dayElement.classList.add('bg-blue-500', 'text-white');
                } else {
                    dayElement.classList.add('text-gray-700');
                }

                dayElement.textContent = day;
                daysContainer.appendChild(dayElement);
            }

            renderImportantDates();
        }

        function changeMonth(delta) {
            selectedDate.setMonth(selectedDate.getMonth() + delta);
            renderCalendar();
        }

        function goToCurrentMonth() {
            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
            renderCalendar();
        }

        function renderImportantDates() {
            const importantDatesList = document.getElementById('important-dates');
            importantDatesList.innerHTML = '';

            for (const [date, description] of Object.entries(specialDates)) {
                // Ya está en formato DD/MM/YYYY
                const li = document.createElement('li');
                li.textContent = `${date}: ${description}`;
                importantDatesList.appendChild(li);
            }
        }

        function toggleAccordion() {
            const accordionContent = document.getElementById('accordion-content');
            accordionContent.classList.toggle('hidden');
        }

        renderCalendar();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>
