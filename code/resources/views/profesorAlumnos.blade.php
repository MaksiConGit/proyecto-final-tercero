<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de Carreras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
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

    <nav class="bg-purple-800 text-white p-4 flex justify-evenly">
        <div class="flex">
            <ol class="flex items-center justify-center">
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
                    <a href="#" class="text-white hover:underline font-semibold">Sistemas</a>
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
                    <a href="#" class="text-white hover:underline font-semibold">Año de carrera</a>
                </li>

            </ol>

        </div>
        <div class="flex justify-center h-min">
            <input type="text" placeholder="Buscar alumno..."
                class="w-4/4 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-black"
                onkeyup="searchStudent()" id="search-bar">
        </div>

    </nav>

    <div class="flex py-2">
        <aside class=" w-44 bg-gray-200 text-black min-h-screen border-r-2 border-gray-300 p-2">
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

        {{-- Cuerpo --}}
            <div class="max-w-md h-min mx-auto bg-white p-3 rounded-lg shadow-lg w-2/6">
                <h2 class="flex text-xl font-bold text-purple-700 mb-5 pb-2 justify-center border-b-2 border-purple-300">Alumnos 3ro de Sistemas</h2>
    
                <ul class="space-y-2" id="student-list">
                    <li class="flex items-center justify-between bg-gray-50 p-2 rounded-md shadow-sm" data-name="Aguirre Gerónimo" data-email="gero@gmail.com" data-attendance="85">
                        <span class="text-gray-700">1. Aguirre Gerónimo</span>
                        <input type="radio" name="student" value="Aguirre Gerónimo" class="w-5 h-5 text-purple-600 focus:ring-purple-500" onclick="updateSelectedStudent(this)">
                    </li>
                    <li class="flex items-center justify-between bg-gray-50 p-2 rounded-md shadow-sm" data-name="Alcaraz Maximiliano Ariel" data-email="elquelegustabootstrap@noseastroloman.com" data-attendance="92">
                        <span class="text-gray-700">2. Alcaraz Maximiliano Ariel</span>
                        <input type="radio" name="student" value="Alcaraz Maximiliano Ariel" class="w-5 h-5 text-purple-600 focus:ring-purple-500" onclick="updateSelectedStudent(this)">
                    </li>
                    <li class="flex items-center justify-between bg-gray-50 p-2 rounded-md shadow-sm" data-name="Bazan Mateo" data-email="bazan.mateo@example.com" data-attendance="75">
                        <span class="text-gray-700">3. Bazan Mateo</span>
                        <input type="radio" name="student" value="Bazan Mateo" class="w-5 h-5 text-purple-600 focus:ring-purple-500" onclick="updateSelectedStudent(this)">
                    </li>
                    <li class="flex items-center justify-between bg-gray-50 p-2 rounded-md shadow-sm" data-name="Velez Nicolás" data-email="velez.nicolas@example.com" data-attendance="88">
                        <span class="text-gray-700">22. Velez Nicolás</span>
                        <input type="radio" name="student" value="Velez Nicolás" class="w-5 h-5 text-purple-600 focus:ring-purple-500" onclick="updateSelectedStudent(this)">
                    </li>
                </ul>
            </div>
    
            <div class="p-4 mr-40 bg-white text-purple-800 rounded-md w-2/6 h-min block" id="selected-student">
                <p class="font-medium">Seleccionado: <span class="font-normal" id="student-name">-</span></p>
                <p class="font-medium">Email: <span  class="font-normal" id="student-email">-</span></p>
                <div class="mt-4 w-4/6 m-auto">
                    <canvas class=" h-1/12" id="attendance-chart"></canvas>
                </div>
            </div>
    
{{-- testear para hacerlo con liverwire --}}
        <script>
            let attendanceChart; // Variable to hold the Chart.js instance
    
            // Function to update the displayed selected student's name, email, and attendance chart
            function updateSelectedStudent(radio) {
                const studentItem = radio.closest("li");
                const studentName = studentItem.getAttribute("data-name");
                const studentEmail = studentItem.getAttribute("data-email");
                const studentAttendance = studentItem.getAttribute("data-attendance");
    
                // Update the name and email in the display div
                document.getElementById("student-name").textContent = studentName;
                document.getElementById("student-email").textContent = studentEmail;
    
                // Update or create the attendance chart
                updateAttendanceChart(studentName, studentAttendance);
            }
    
            // Function to initialize or update the attendance chart
            function updateAttendanceChart(studentName, attendancePercentage) {
                const attendanceData = [attendancePercentage, 100 - attendancePercentage];
    
                if (attendanceChart) {
                    // Update existing chart data
                    attendanceChart.data.datasets[0].data = attendanceData;
                    attendanceChart.data.datasets[0].label = `Attendance for ${studentName}`;
                    attendanceChart.update();
                } else {
                    // Create a new chart
                    const ctx = document.getElementById('attendance-chart').getContext('2d');
                    attendanceChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Asistencia', 'Inasistencia'],
                            datasets: [{
                                label: `Attendance for ${studentName}`,
                                data: attendanceData,
                                backgroundColor: ['#4F46E5', '#E5E7EB'], // Purple for attendance, light gray for absence
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            return label + ': ' + context.raw + '%';
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
    
            // Function to search and filter students
            function searchStudent() {
                const query = document.getElementById("search-bar").value.toLowerCase();
                const students = document.querySelectorAll("#student-list li");
    
                students.forEach(student => {
                    const name = student.getAttribute("data-name").toLowerCase();
                    if (name.includes(query)) {
                        student.style.display = "flex";
                    } else {
                        student.style.display = "none";
                    }
                });
            }
        </script>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
