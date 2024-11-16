<style>
    table td[contenteditable="true"] {
        background-color: #ffffff;
        outline: none;
        cursor: text;
    }

    table td[contenteditable="true"]:focus {
        background-color: #c9d7de;
        /* Color amarillo claro para la celda activa */
    }
</style>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Horarios</h2>
        <div class="table-responsive rounded-2">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center fs-6">Hora</th>
                        <th class="text-center fs-6">Lunes</th>
                        <th class="text-center fs-6">Martes</th>
                        <th class="text-center fs-6">Miércoles</th>
                        <th class="text-center fs-6">Jueves</th>
                        <th class="text-center fs-6">Viernes</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Filas de ejemplo -->
                    <tr>
                        <th scope="row" class="d-flex justify-content-center fs-6">8:00 - 9:00</th>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-flex justify-content-center fs-6">9:00 - 10:00</th>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-flex justify-content-center fs-6">10:00 - 11:00</th>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <!-- Agrega más filas según sea necesario -->
                </tbody>
            </table>
        </div>
    </div>
