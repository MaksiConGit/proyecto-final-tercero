<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Horario de Carreras</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    </head>
<body class="bg-gray-200">

    <header class="bg-purple-900 text-white px-5 py-2 ">
        <div class="m-0 flex items-center justify-between ">
            <h1 class="text-2xl font-bold">Instituto</h1>
            <div class="w-8 h-8">
                <img src="./imagenes/usuario_foto.png" alt="Icono de usuario">
            </div>
        </div>
    </header>

    <nav class="bg-purple-800 text-white p-4">
          <ol class="flex items-center justify-center space-x-2">
            <li>
              <a href="#" class="flex items-center text-white hover:underline font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10.707 1.707a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                </svg>
                Inicio
              </a>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </li>
            <li>
              <a href="#" class="text-white hover:underline font-semibold">Categoría</a>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </li>
            <li class="text-white font-semibold">
              Página actual
            </li>
          </ol>
        </div>
    </nav>

    <div class="flex py-2">
        <aside class=" w-44 bg-gray-200 text-black min-h-screen border-r-2 border-gray-300 p-2">
            <h2 class="text-xl font-bold mb-4 flex justify-center pb-2 border-b-2 border-gray-400">Carreras</h2>
            <ul class="space-y-4">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-gray-300 text-gray-900" data-inactive-classes="text-gray-600">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">  
                          <span >Sistemas</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
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
                      <button type="button" class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                        <span>Robotica</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
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
                      <button type="button" class="flex items-center justify-start pl-2 w-full py-3 font-medium rtl:text-right text-gray-500 border-b gap-3 border-gray-600" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                        <span>Industrial</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
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

<div class="flex-1 p-6">
        <div class="flex justify-between">
            <div class="ml-4 grid grid-cols-3 gap-4">

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                    <img src="/imagenes/Materia.png" alt="Base de Datos" class="w-full h-32 object-cover">
                    <div class="p-2">
                        <h2 class="font-bold text-lg">Base de Datos</h2>
                        <p class="text-gray-500">Nicolas Rotili</p>
                        <p class="text-gray-600">Lun. 18h a 20h</p>
                    </div>
                </div></a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                    <img src="/imagenes/Materia.png" alt="Base de Datos" class="w-full h-32 object-cover">
                    <div class="p-2">
                        <h2 class="font-bold text-lg">Base de Datos</h2>
                        <p class="text-gray-500">Nicolas Rotili</p>
                        <p class="text-gray-600">Lun. 18h a 20h</p>
                    </div>
                </div></a>
                
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                    <img src="/imagenes/Materia.png" alt="Base de Datos" class="w-full h-32 object-cover">
                    <div class="p-2">
                        <h2 class="font-bold text-lg">Base de Datos</h2>
                        <p class="text-gray-500">Nicolas Rotili</p>
                        <p class="text-gray-600">Lun. 18h a 20h</p>
                    </div>
                </div></a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                    <img src="/imagenes/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                    <div class="p-2">
                        <h2 class="font-bold text-lg">Matematicas</h2>
                        <p class="text-gray-500">Fede</p>
                        <p class="text-gray-600">Lun. 18h a 20h</p>
                    </div>
                </div></a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                    <img src="/imagenes/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                    <div class="p-2">
                        <h2 class="font-bold text-lg">Seguridad</h2>
                        <p class="text-gray-500">Walter</p>
                        <p class="text-gray-600">Lun. 18h a 20h</p>
                    </div>
                </div></a>

                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl">
                        <img src="/imagenes/Materia.png" alt="Materia" class="w-full h-32 object-cover">
                        <div class="p-2">
                            <h2 class="font-bold text-lg">Programacion</h2>
                            <p class="text-gray-500">Nico Rotili</p>
                            <p class="text-gray-600">Lun. 18h a 20h</p>
                        </div>
                    </div>
                </div></a>

            <aside>
                <div class="bg-white p-4 rounded-lg shadow-md mr-4">
                    <h3 class="text-lg font-bold mb-4 border-b-2 border-gray-300 text-center">Calendario</h3>
                    <div class="grid grid-cols-7 gap-1 text-center">
                        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                        <span></span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
                        <span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span>
                        <span>14</span><span>15</span><span class="text-red-500">16</span><span>17</span><span>18</span><span>19</span><span>20</span>
                        <span>21</span><span>22</span><span>23</span><span>24</span><span>25</span><span>26</span><span>27</span>
                        <span>28</span><span>29</span><span>30</span><span>31</span><span></span><span></span><span></span>
                    </div>
                    <p class="text-red-500 mt-4 text-center">Días no hábiles</p>
                </div>
            </aside>
        </div>
    </div>

    <div class="fixed bottom-6 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
      <img src="./imagenes/mas.png" alt="Botón 1" class="w-10 h-10">
    </div>
  
    <!-- Botón 2 -->
    <div class="fixed bottom-24 right-6 w-16 h-16 bg-purple-700 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
      <img src="./imagenes/estudiantes.png" alt="Botón 2" class="w-10 h-10">
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
