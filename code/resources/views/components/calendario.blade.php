<aside class="pr-7 pt-6">

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
                <button class="w-1/3 bg-green-500 text-white mt-4 py-2 rounded-md hover:bg-green-600 m-auto"
                    onclick="goToCurrentMonth()">
                    Mes Actual
                </button>
            </div>

                <!-- Acordeón para fechas importantes -->
                <div class="mt-4">
                    <button class="w-full bg-gray-200 text-gray-700 py-2 rounded-md font-medium hover:bg-gray-300"
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
</aside>
